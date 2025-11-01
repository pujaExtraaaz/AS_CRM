# Lead API with Fixed Token - Quick Start Guide

## 🚀 What Was Created

A complete API endpoint for creating leads with fixed token authentication, perfect for integrations with third-party services, webhooks, or mobile apps.

### Files Created/Modified:

1. ✅ **Middleware:** `app/Http/Middleware/FixedApiToken.php`
2. ✅ **Controller:** `app/Http/Controllers/Api/LeadController.php` (added `createWithToken` method)
3. ✅ **Route:** `routes/api.php` (added `/api/leads/create` endpoint)
4. ✅ **Kernel:** `app/Http/Kernel.php` (registered middleware)

### Documentation Files:

- 📖 **API_LEAD_DOCUMENTATION.md** - Complete API documentation with examples
- 🔧 **SETUP_API_TOKEN.md** - Setup instructions
- 📬 **Postman_Collection_Lead_API.json** - Postman collection for testing

## 📝 Quick Setup (3 Steps)

### Step 1: Add Token to .env
```env
FIXED_API_TOKEN=your-secret-api-token-here
```

Generate a secure token:
```bash
php artisan tinker
Str::random(60)
```

### Step 2: Clear Cache (if needed)
```bash
php artisan config:clear
php artisan cache:clear
```

### Step 3: Test the API
```bash
curl -X POST http://localhost/api/leads/create \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer your-secret-api-token-here" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+1234567890"
  }'
```

## 🎯 API Endpoint

**URL:** `POST /api/leads/create`

**Authentication:** Fixed Token (in header or body)

**Required Fields:**
- `name` - Lead's full name
- `email` - Valid email address
- `phone` - Phone number

**Optional Fields:** title, lead_postalcode, opportunity_amount, status, source, lead_country, lead_state, lead_city, lead_address, website, campaign, industry, description, account, user_id

## 📮 Testing with Postman

1. Import `Postman_Collection_Lead_API.json` into Postman
2. Update the variables:
   - `BASE_URL` = `http://localhost` (or your domain)
   - `API_TOKEN` = your token from .env
3. Run the requests!

## 🔐 Authentication

### Method 1: Authorization Header (Recommended)
```
Authorization: Bearer your-secret-api-token-here
```

### Method 2: Request Body
```json
{
  "api_token": "your-secret-api-token-here",
  "name": "John Doe",
  ...
}
```

## ✅ Success Response
```json
{
  "status": "success",
  "message": "Lead created successfully",
  "data": {
    "id": 123,
    "name": "John Doe",
    "email": "john@example.com",
    ...
  }
}
```

## ❌ Error Responses

### 401 Unauthorized
```json
{
  "status": "error",
  "message": "Unauthorized. Invalid API token."
}
```

### 422 Validation Error
```json
{
  "status": "error",
  "errors": {
    "email": ["The email field is required."]
  }
}
```

## 🔍 How It Works

1. Request hits `/api/leads/create` endpoint
2. `FixedApiToken` middleware checks the token
3. If valid, `LeadController@createWithToken` processes the request
4. Lead is created and saved to database
5. Success response with lead data is returned

## 🛠️ Troubleshooting

**401 Error?**
- Check token in .env matches request
- Verify Authorization header format: `Bearer YOUR_TOKEN`
- Run `php artisan config:clear`

**422 Validation Error?**
- Ensure required fields (name, email, phone) are included
- Check email format is valid

**500 Server Error?**
- Check `storage/logs/laravel.log`
- Verify database connection

## 📚 Complete Documentation

For detailed examples in multiple languages (PHP, Python, JavaScript, etc.), see:
- **API_LEAD_DOCUMENTATION.md** - Full API documentation
- **SETUP_API_TOKEN.md** - Detailed setup guide

## 🔒 Security Best Practices

✅ Use a strong, random token (60+ characters)  
✅ Always use HTTPS in production  
✅ Keep .env file secure (never commit to git)  
✅ Rotate tokens periodically  
✅ Use different tokens for dev/staging/production  

## 💡 Use Cases

Perfect for:
- External form submissions
- Third-party integrations
- Mobile app lead creation
- Webhook receivers
- Marketing automation tools
- Lead capture widgets

## 🎉 You're All Set!

Your API is ready to accept lead submissions. Just:
1. Set up your token in .env
2. Share the endpoint URL and token with your integration
3. Start receiving leads!

For questions or issues, check the logs at `storage/logs/laravel.log`

---

**Need Help?** See the complete documentation in the files listed above.


