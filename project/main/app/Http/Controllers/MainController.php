<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function about()
    {
        $galleries = DB::table('galleries')->where('status', 1)->orderBy('sort_order')->take(6)->get();

        return view('about', compact('galleries'));
    }

    public function plantingMethod()
    {
        return view('planting-method');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $thanks = function ($name) {
            // ?sent=1 shows the success message even if the session cookie was lost
            return redirect(route('contact') . '?sent=1#contact_form')
                ->with('status', "Thanks for reaching out, {$name}! We'll get back to you shortly.");
        };

        // Honeypot: real users never fill this field — pretend success, store nothing.
        if ($request->filled('website')) {
            return $thanks(strip_tags((string) $request->input('name')));
        }

        // Time-trap: too fast (bot) or stale/tampered token.
        try {
            $renderedAt = (int) decrypt($request->input('form_ts'));
        } catch (\Exception $e) {
            $renderedAt = 0;
        }
        $elapsed = time() - $renderedAt;
        if ($renderedAt === 0 || $elapsed < 3 || $elapsed > 7200) {
            return back()->withInput()->withErrors(['spam' => __('common.spam_detected')]);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^[0-9+\-\s()]{7,20}$/'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        if (!$this->verifyRecaptcha((string) $request->input('g-recaptcha-response'), $request->ip())) {
            return back()->withInput()->withErrors(['recaptcha' => __('common.recaptcha_failed')]);
        }

        $name = trim(strip_tags($data['name']));
        $message = trim(strip_tags($data['message']));
        $message = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $message);

        // Link-heavy messages are almost always spam.
        if (preg_match_all('~https?://|www\.~i', $message) > 2) {
            return back()->withInput()->withErrors(['spam' => __('common.spam_detected')]);
        }

        // Duplicate within 24h: report success without storing again.
        $duplicate = DB::table('contact_messages')
            ->where('email', $data['email'])
            ->where('message', $message)
            ->where('created_at', '>=', now()->subDay())
            ->exists();
        if ($duplicate) {
            return $thanks($name);
        }

        DB::table('contact_messages')->insert([
            'name' => $name,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $message,
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
            'is_read' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $thanks($name);
    }

    /**
     * reCAPTCHA key pair for a host: per-domain entry from config/services.php,
     * falling back to the .env default (localhost etc.).
     */
    public static function recaptchaKeys($host)
    {
        $host = preg_replace('/^www\./', '', strtolower((string) $host));
        $sites = config('services.recaptcha.sites', []);

        if (isset($sites[$host])) {
            return $sites[$host];
        }

        return [
            'site_key' => config('services.recaptcha.site_key'),
            'secret' => config('services.recaptcha.secret'),
        ];
    }

    private function verifyRecaptcha($token, $ip)
    {
        $secret = self::recaptchaKeys(request()->getHost())['secret'];
        if ($token === '' || !$secret) {
            return false;
        }

        $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query(['secret' => $secret, 'response' => $token, 'remoteip' => $ip]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_SSL_VERIFYPEER => true,
        ]);
        $body = curl_exec($ch);
        curl_close($ch);

        if ($body === false) {
            return false;
        }
        $json = json_decode($body, true);

        return is_array($json) && !empty($json['success']);
    }

    public function gallery()
    {
        $galleries = DB::table('galleries')->where('status', 1)->orderBy('sort_order')->get();

        return view('gallery', compact('galleries'));
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function cancellationPolicy()
    {
        return view('cancellation-policy');
    }

    public function deliveryPolicy()
    {
        return view('delivery-policy');
    }
}
