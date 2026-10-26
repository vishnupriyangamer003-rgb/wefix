# WEFIX Database Documentation

## 1. Current Database Status

The WEFIX website currently operates as a **presentation / static Blade template driven site** within Laravel. 
No active database tables are required for the landing page (`welcome.blade.php`).

---

## 2. Configuration & Connection (`project/main/.env`)

- **Default Driver**: `mysql`
- **Host**: `127.0.0.1` (Port: `3306`)
- **Database**: `wefix`
- **Username**: `root`
- **Password**: *(empty by default on XAMPP)*

---

## 3. Conventions for Future Database Work

If contact inquiries, quotation requests, or project galleries are migrated to the database:

1. **Migrations**: Create migrations via `php artisan make:migration create_<table_name>_table`.
2. **Table Naming**: Lowercase plural (e.g., `inquiries`, `projects`, `services`).
3. **Primary Keys**: Auto-incrementing unsigned `id` (`$table->id()`).
4. **Timestamps**: Always include `$table->timestamps()`.
5. **Validation**: Use FormRequest classes under `app/Http/Requests` before database insertion.
6. **Backup Protocol**: Check table state and export SQL before running destructive migrations (`migrate:fresh`).
