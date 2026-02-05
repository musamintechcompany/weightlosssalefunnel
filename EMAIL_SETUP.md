# Email Setup Guide

## ✅ What's Been Created:

### 1. Database Migration
- `database/migrations/xxxx_create_orders_table.php` - Stores all order details

### 2. Order Model
- `app/Models/Order.php` - Handles order data

### 3. Email Classes (Mailables)
- `app/Mail/OrderConfirmation.php` - Customer confirmation email
- `app/Mail/NewOrderNotification.php` - Admin notification email

### 4. Email Views
- `resources/views/emails/order-confirmation.blade.php` - Customer email template
- `resources/views/emails/new-order-notification.blade.php` - Admin email template

## 🚀 Setup Steps:

### Step 1: Update Your Admin Email
Open `.env` file and change:
```
ADMIN_EMAIL=your-email@example.com
```
to your actual email address.

### Step 2: Run Migration
```bash
php artisan migrate
```

### Step 3: Test with Log Driver (Current Setup)
Your `.env` is set to `MAIL_MAILER=log`, which means emails will be saved to:
```
storage/logs/laravel.log
```
This is perfect for testing!

### Step 4: (Optional) Use Real Email Service

#### For Gmail/SMTP:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Weight Loss Products"
```

#### For Mailtrap (Testing):
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
```

#### For Mailgun:
```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=your-domain.mailgun.org
MAILGUN_SECRET=your-mailgun-secret
```

## 📧 How It Works:

1. Customer fills checkout form
2. Order is saved to database
3. Two emails are sent:
   - **Customer Email**: Order confirmation with details
   - **Admin Email**: Notification with customer info

## 🧪 Testing:

1. Fill out checkout form
2. Submit order
3. Check `storage/logs/laravel.log` for email content
4. Check database for saved order: `SELECT * FROM orders;`

## 📝 Notes:

- **No migration needed for users** - Orders are stored independently
- Emails use Laravel's Markdown templates (clean & responsive)
- All order data is validated before saving
- Admin email comes from `.env` file (easy to change)
