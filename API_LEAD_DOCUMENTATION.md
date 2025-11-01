# Lead API with Fixed Token Authentication

This documentation explains how to use the Lead Creation API with fixed token authentication.

## Setup

### 1. Configure the API Token

Add the following to your `.env` file:

```env
FIXED_API_TOKEN=your-secret-api-token-here
```

**Important:** Replace `your-secret-api-token-here` with a strong, unique token. You can generate one using:
```bash
php artisan tinker
>>> Str::random(60)
```

### 2. API Endpoint

**URL:** `POST /api/leads/create`

**Authentication:** Fixed API Token (sent in header or request body)

## Usage

### Authentication Methods

You can send the API token in two ways:

#### Option 1: Authorization Header (Recommended)
```bash
Authorization: Bearer your-secret-api-token-here
```

#### Option 2: Request Parameter
```json
{
  "api_token": "your-secret-api-token-here",
  ...other fields
}
```

## Request Example

### cURL Example

```bash
curl -X POST https://yourdomain.com/api/leads/create \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer your-secret-api-token-here" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+1234567890",
    "title": "Mr.",
    "lead_postalcode": "12345",
    "opportunity_amount": 5000,
    "status": 0,
    "source": 1,
    "lead_country": "USA",
    "lead_state": "California",
    "lead_city": "Los Angeles",
    "lead_address": "123 Main St",
    "website": "https://example.com",
    "campaign": 1,
    "industry": 1,
    "description": "Potential client from website",
    "account": 1,
    "user_id": 2
  }'
```

### JavaScript (Fetch API) Example

```javascript
const createLead = async () => {
  const response = await fetch('https://yourdomain.com/api/leads/create', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer your-secret-api-token-here'
    },
    body: JSON.stringify({
      name: 'John Doe',
      email: 'john@example.com',
      phone: '+1234567890',
      title: 'Mr.',
      lead_postalcode: '12345',
      opportunity_amount: 5000,
      status: 0,
      source: 1,
      lead_country: 'USA',
      lead_state: 'California',
      lead_city: 'Los Angeles',
      lead_address: '123 Main St',
      website: 'https://example.com',
      description: 'Potential client from website',
      user_id: 2
    })
  });
  
  const data = await response.json();
  console.log(data);
};
```

### PHP Example

```php
<?php
$url = 'https://yourdomain.com/api/leads/create';
$token = 'your-secret-api-token-here';

$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'phone' => '+1234567890',
    'title' => 'Mr.',
    'lead_postalcode' => '12345',
    'opportunity_amount' => 5000,
    'status' => 0,
    'source' => 1,
    'lead_country' => 'USA',
    'lead_state' => 'California',
    'lead_city' => 'Los Angeles',
    'lead_address' => '123 Main St',
    'website' => 'https://example.com',
    'description' => 'Potential client from website',
    'user_id' => 2
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Response Code: $httpCode\n";
echo "Response: $response\n";
?>
```

### Python Example

```python
import requests

url = 'https://yourdomain.com/api/leads/create'
token = 'your-secret-api-token-here'

headers = {
    'Content-Type': 'application/json',
    'Authorization': f'Bearer {token}'
}

data = {
    'name': 'John Doe',
    'email': 'john@example.com',
    'phone': '+1234567890',
    'title': 'Mr.',
    'lead_postalcode': '12345',
    'opportunity_amount': 5000,
    'status': 0,
    'source': 1,
    'lead_country': 'USA',
    'lead_state': 'California',
    'lead_city': 'Los Angeles',
    'lead_address': '123 Main St',
    'website': 'https://example.com',
    'description': 'Potential client from website',
    'user_id': 2
}

response = requests.post(url, json=data, headers=headers)
print(f"Status Code: {response.status_code}")
print(f"Response: {response.json()}")
```

## Request Fields

### Required Fields
- `name` (string, max 120 characters) - Lead's full name
- `email` (string, valid email) - Lead's email address
- `phone` (string) - Lead's phone number

### Optional Fields
- `title` (string) - Title (Mr., Mrs., etc.)
- `lead_postalcode` (string) - Postal/ZIP code
- `opportunity_amount` (numeric) - Potential deal amount
- `status` (integer) - Lead status (0: New, 1: Assigned, 2: In Process, 3: Converted, 4: Recycled, 5: Dead)
- `source` (integer) - Lead source ID
- `lead_country` (string) - Country
- `lead_state` (string) - State/Province
- `lead_city` (string) - City
- `lead_address` (string) - Street address
- `website` (string) - Website URL
- `campaign` (integer) - Campaign ID
- `industry` (integer) - Industry ID
- `description` (text) - Additional notes/description
- `account` (integer) - Account ID
- `user_id` (integer) - User/Owner ID (defaults to 1 if not provided)

## Response Examples

### Success Response (201 Created)

```json
{
  "status": "success",
  "message": "Lead created successfully",
  "data": {
    "id": 123,
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+1234567890",
    "title": "Mr.",
    "lead_postalcode": "12345",
    "opportunity_amount": 5000,
    "status": 0,
    "source": 1,
    "lead_country": "USA",
    "lead_state": "California",
    "lead_city": "Los Angeles",
    "lead_address": "123 Main St",
    "website": "https://example.com",
    "campaign": 1,
    "industry": 1,
    "description": "Potential client from website",
    "account": 1,
    "created_by": 2,
    "created_at": "2025-10-15T10:30:00.000000Z",
    "updated_at": "2025-10-15T10:30:00.000000Z"
  }
}
```

### Validation Error Response (422 Unprocessable Entity)

```json
{
  "status": "error",
  "errors": {
    "email": [
      "The email field is required."
    ],
    "phone": [
      "The phone field is required."
    ]
  }
}
```

### Authentication Error Response (401 Unauthorized)

```json
{
  "status": "error",
  "message": "Unauthorized. Invalid API token."
}
```

### Server Error Response (500 Internal Server Error)

```json
{
  "status": "error",
  "message": "An error occurred while creating the lead",
  "error": "Error details here"
}
```

## Status Codes

- `201` - Lead created successfully
- `401` - Unauthorized (invalid or missing token)
- `422` - Validation error
- `500` - Server error

## Security Best Practices

1. **Keep your API token secret** - Never commit it to version control
2. **Use HTTPS** - Always use HTTPS in production
3. **Rotate tokens regularly** - Change your API token periodically
4. **Monitor usage** - Track API calls for suspicious activity
5. **Environment-specific tokens** - Use different tokens for development, staging, and production

## Testing

You can test the API using tools like:
- **Postman** - Import the cURL example
- **Insomnia** - REST API client
- **Thunder Client** - VS Code extension
- **cURL** - Command line tool

## Troubleshooting

### 401 Unauthorized Error
- Verify the token in your `.env` file matches the one you're sending
- Check that the Authorization header is formatted correctly: `Bearer YOUR_TOKEN`
- Ensure the middleware is registered in `app/Http/Kernel.php`

### 422 Validation Error
- Check that all required fields are included
- Verify email format is valid
- Ensure numeric fields contain numbers only

### 500 Server Error
- Check Laravel logs at `storage/logs/laravel.log`
- Verify database connection
- Ensure all required database fields exist

## Notes

- The default `created_by` user ID is 1 if not specified
- The default `status` is 0 (New) if not specified
- The default `opportunity_amount` is 0 if not specified
- Stream creation is optional and only happens if `user_id` is provided


