# Payment Gateway Setup Guide

## 🚀 QUICK SETUP (15 minutes)

### ✅ What's Been Done:
1. ✅ All prices converted to Naira (₦)
2. ✅ Paystack integration ready
3. ✅ Flutterwave integration ready
4. ✅ Payment selection page created
5. ✅ Database updated with payment tracking
6. ✅ Email notifications after successful payment

---

## 📝 FINAL STEPS TO LAUNCH:

### 1. Get Paystack API Keys (5 minutes)
1. Go to https://paystack.com
2. Sign up or login
3. Go to Settings → API Keys & Webhooks
4. Copy your **Public Key** and **Secret Key**
5. Update `.env` file:
```
PAYSTACK_PUBLIC_KEY=pk_test_xxxxxxxxxxxxx
PAYSTACK_SECRET_KEY=sk_test_xxxxxxxxxxxxx
```

### 2. Get Flutterwave API Keys (5 minutes)
1. Go to https://flutterwave.com
2. Sign up or login
3. Go to Settings → API Keys
4. Copy your **Public Key** and **Secret Key**
5. Update `.env` file:
```
FLUTTERWAVE_PUBLIC_KEY=FLWPUBK_TEST-xxxxxxxxxxxxx
FLUTTERWAVE_SECRET_KEY=FLWSECK_TEST-xxxxxxxxxxxxx
```

### 3. Test the System (5 minutes)
1. Start server: `php artisan serve`
2. Visit: http://localhost:8000
3. Click "Buy Now" on any product
4. Fill checkout form
5. Select payment method (Paystack or Flutterwave)
6. Use test cards:
   - **Paystack Test Card**: 4084084084084081 | CVV: 408 | Expiry: 12/30 | PIN: 0000
   - **Flutterwave Test Card**: 5531886652142950 | CVV: 564 | Expiry: 09/32 | PIN: 3310 | OTP: 12345

---

## 🎯 CURRENT PRICES:
- Slim Tea: ₦45,000
- Fat Burner: ₦60,000
- Bundle: ₦75,000

---

## 🔄 PAYMENT FLOW:
1. Customer clicks "Buy Now"
2. Fills shipping information
3. Selects payment method (Paystack or Flutterwave)
4. Redirected to payment gateway
5. Completes payment
6. Redirected back to thank you page
7. Emails sent automatically (customer + admin)

---

## 📧 EMAIL NOTIFICATIONS:
- Customer receives order confirmation
- Admin receives new order notification
- Emails sent ONLY after successful payment

---

## 🔐 SECURITY:
- Payment handled by Paystack/Flutterwave (PCI compliant)
- No card details stored on your server
- SSL encryption required for production
- Payment verification before order confirmation

---

## 🚀 GO LIVE CHECKLIST:
- [ ] Add real Paystack keys (replace test keys)
- [ ] Add real Flutterwave keys (replace test keys)
- [ ] Update APP_URL in .env to your domain
- [ ] Enable SSL certificate (HTTPS)
- [ ] Test one real transaction
- [ ] Monitor admin email for orders

---

## ⚡ LAUNCH COMMAND:
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

---

## 💡 TIPS:
- Start with TEST MODE to verify everything works
- Switch to LIVE MODE only after successful test
- Keep your SECRET KEYS private
- Monitor your email for order notifications

---

## 🆘 TROUBLESHOOTING:
- **Payment fails**: Check API keys in .env
- **No email**: Check MAIL settings in .env
- **Database error**: Run `php artisan migrate:fresh`
- **Page not found**: Run `php artisan route:clear`

---

## 📊 ADMIN DASHBOARD (Optional - Add Later):
After launch, we can add:
- View all orders
- Track payment status
- Export order data
- Analytics dashboard

This can be done in 2-3 hours after your initial launch.

---

**ESTIMATED TIME TO LAUNCH: 15 minutes** ⏰

Good luck with your launch! 🚀
