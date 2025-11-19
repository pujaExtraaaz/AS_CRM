# Setup Instructions for Fixed API Token

## Step 1: Add Token to .env File

Add this line to your `.env` file:

```env
FIXED_API_TOKEN=your-secret-api-token-here
```

## Step 2: Generate a Secure Token

You can generate a secure random token using one of these methods:

### Method 1: Using PHP Artisan Tinker
```bash
php artisan tinker
```
Then run:
```php
Str::random(60)
```
Copy the output and use it as your token.

### Method 2: Using Online Generator
Visit: https://randomkeygen.com/ and copy a Fort Knox Password

### Method 3: Using Command Line
```bash
# On Linux/Mac
openssl rand -base64 32

# On Windows PowerShell
-join ((65..90) + (97..122) + (48..57) | Get-Random -Count 32 | % {[char]$_})
```

## Step 3: Update .env File

Replace `your-secret-api-token-here` with your generated token:

```env
FIXED_API_TOKEN=vYm5kNWM3ZjQwYWJjZGVmZ2hpamtsbW5vcHFyc3R1dnd4eXowMTIzNDU2Nzg5
```

## Step 4: Clear Config Cache (if needed)

If you're in production or have cached configs, run:

```bash
php artisan config:clear
php artisan cache:clear
```

## Step 5: Test the API

Use the provided examples in `API_LEAD_DOCUMENTATION.md` to test your API endpoint.

Example quick test with cURL:

```bash
curl -X POST http://localhost/api/leads/create \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_GENERATED_TOKEN_HERE" \
  -d '{
    "name": "Test Lead",
    "email": "test@example.com",
    "phone": "+1234567890"
  }'
```

## Security Reminders

✅ **DO:**
- Use a strong, random token
- Keep your .env file secure
- Use HTTPS in production
- Rotate tokens periodically
- Use different tokens for different environments

❌ **DON'T:**
- Commit .env file to version control
- Share your token publicly
- Use simple or guessable tokens
- Use the same token across all environments

## What Was Created

1. **Middleware:** `app/Http/Middleware/FixedApiToken.php` - Validates the API token
2. **Controller Method:** `app/Http/Controllers/Api/LeadController.php@createWithToken` - Handles lead creation
3. **Route:** `POST /api/leads/create` - The API endpoint
4. **Middleware Registration:** Added to `app/Http/Kernel.php`

## API Endpoint Details

- **URL:** `POST /api/leads/create`
- **Authentication:** Fixed token (Bearer or api_token parameter)
- **Required Fields:** name, email, phone
- **Optional Fields:** See API_LEAD_DOCUMENTATION.md for full list

## Troubleshooting

If you get a 401 Unauthorized error:
1. Check your .env file has the FIXED_API_TOKEN set
2. Verify you're sending the same token in your request
3. Make sure you're using the correct format: `Bearer YOUR_TOKEN`
4. Try clearing the config cache: `php artisan config:clear`

If you get a 500 error:
1. Check `storage/logs/laravel.log` for details
2. Verify your database connection
3. Ensure all required permissions are set

For more examples and details, see `API_LEAD_DOCUMENTATION.md`


