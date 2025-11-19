# Lead Form API Integration Documentation

## API Endpoint

**URL:** `https://live.extraaaz.com/api/leads/form`  
**Method:** `POST`  
**Content-Type:** `application/json`

## Form Types and Fields

The API accepts data from different form types. Below are the required and optional fields for each form type:

### Common Required Fields (All Forms)
| Field | Type | Description |
|-------|------|-------------|
| `email` | string | Email address of the lead |
| `formType` | string | Type of form (`contact`, `partner`, or `blueprint`) |
| `name` or `fullName` | string | Name of the lead |

### Contact Form
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "1234567890",
  "message": "I would like to know more about your services",
  "businessType": "E-commerce",
  "location": "New York",
  "formType": "contact"
}
```

### Growth Blueprint Form
```json
{
  "name": "Robert Johnson",
  "email": "robert@example.com",
  "phone": "5551234567",
  "businessType": "SaaS",
  "formType": "blueprint"
}
```

### Partner Form
```json
{
  "fullName": "Jane Smith",
  "email": "jane@example.com",
  "mobile": "9876543210",
  "cityState": "Chicago, IL",
  "applyingFor": "Channel Sales Partner",
  "businessBackground": "10 years in retail business",
  "message": "Interested in partnership opportunities",
  "formType": "partner"
}
```

### General Contact Form
```json
{
  "name": "Alex Brown",
  "email": "alex@example.com",
  "mobile": "5551234567",
  "location": "Boston",
  "business": "Marketing Agency",
  "message": "Looking for a CRM solution",
  "formType": "contact"
}
```

## Lead Processing

When leads are submitted through this API:
1. They are automatically assigned to the admin user (user_id = 1)
2. They are created with created_by = 3
3. They have source set to 'website'
4. They are visible only to admin users until reassigned

## cURL Examples

### Contact Modal Form
```bash
curl -X POST \
  https://live.extraaaz.com/api/leads/form \
  -H 'Content-Type: application/json' \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "1234567890",
    "message": "I would like to know more about your services",
    "businessType": "E-commerce",
    "formType": "contact"
  }'
```

### Growth Blueprint Form
```bash
curl -X POST \
  https://live.extraaaz.com/api/leads/form \
  -H 'Content-Type: application/json' \
  -d '{
    "name": "Robert Johnson",
    "email": "robert@example.com",
    "phone": "5551234567",
    "businessType": "SaaS",
    "formType": "blueprint"
  }'
```

### Become Partner Form
```bash
curl -X POST \
  https://live.extraaaz.com/api/leads/form \
  -H 'Content-Type: application/json' \
  -d '{
    "fullName": "Jane Smith",
    "email": "jane@example.com",
    "mobile": "9876543210",
    "cityState": "Chicago, IL",
    "applyingFor": "Channel Sales Partner",
    "businessBackground": "10 years in retail business",
    "message": "Interested in partnership opportunities",
    "formType": "partner"
  }'
```

### Contact Page Form
```bash
curl -X POST \
  https://live.extraaaz.com/api/leads/form \
  -H 'Content-Type: application/json' \
  -d '{
    "name": "Alex Brown",
    "email": "alex@example.com",
    "mobile": "5551234567",
    "location": "Boston",
    "business": "Marketing Agency",
    "message": "Looking for a CRM solution",
    "formType": "contact"
  }'
```

## Response Format

### Success Response (HTTP 201)
```json
{
  "status": "success",
  "message": "Lead successfully created",
  "data": {
    "lead_id": 123
  }
}
```

### Validation Error Response (HTTP 422)
```json
{
  "status": "error",
  "message": "Validation error",
  "errors": {
    "email": ["The email field is required."],
    "name": ["The name field is required."]
  }
}
```

### Server Error Response (HTTP 500)
```json
{
  "status": "error",
  "message": "An error occurred while creating the lead",
  "error": "Error details"
}
```

## JavaScript Integration Examples

### Basic Fetch Example
```javascript
async function submitLeadForm(formData) {
  try {
    const response = await fetch('https://live.extraaaz.com/api/leads/form', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(formData),
    });
    
    const result = await response.json();
    
    if (result.status === 'success') {
      // Show success message
      console.log('Form submitted successfully!');
      return true;
    } else {
      // Handle errors
      console.error('Form submission error:', result.message);
      return false;
    }
  } catch (error) {
    console.error('Error submitting form:', error);
    return false;
  }
}
```

### React Component Example
```jsx
import { useState } from 'react';

function ContactForm() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    message: '',
    businessType: '',
    formType: 'contact'
  });
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [submitResult, setSubmitResult] = useState(null);
  
  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };
  
  const handleSubmit = async (e) => {
    e.preventDefault();
    setIsSubmitting(true);
    
    try {
      const response = await fetch('https://live.extraaaz.com/api/leads/form', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      });
      
      const result = await response.json();
      
      if (result.status === 'success') {
        setSubmitResult({
          type: 'success',
          message: 'Thank you for your submission!'
        });
        // Reset form
        setFormData({
          name: '',
          email: '',
          phone: '',
          message: '',
          businessType: '',
          formType: 'contact'
        });
      } else {
        setSubmitResult({
          type: 'error',
          message: result.message || 'An error occurred. Please try again.'
        });
      }
    } catch (error) {
      setSubmitResult({
        type: 'error',
        message: 'An error occurred. Please try again later.'
      });
    } finally {
      setIsSubmitting(false);
    }
  };
  
  return (
    <form onSubmit={handleSubmit}>
      {submitResult && (
        <div className={`alert alert-${submitResult.type}`}>
          {submitResult.message}
        </div>
      )}
      
      <div className="form-group">
        <label htmlFor="name">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          value={formData.name}
          onChange={handleChange}
          required
        />
      </div>
      
      <div className="form-group">
        <label htmlFor="email">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          value={formData.email}
          onChange={handleChange}
          required
        />
      </div>
      
      <div className="form-group">
        <label htmlFor="phone">Phone</label>
        <input
          type="tel"
          id="phone"
          name="phone"
          value={formData.phone}
          onChange={handleChange}
        />
      </div>
      
      <div className="form-group">
        <label htmlFor="businessType">Business Type</label>
        <input
          type="text"
          id="businessType"
          name="businessType"
          value={formData.businessType}
          onChange={handleChange}
        />
      </div>
      
      <div className="form-group">
        <label htmlFor="message">Message</label>
        <textarea
          id="message"
          name="message"
          value={formData.message}
          onChange={handleChange}
        ></textarea>
      </div>
      
      <button type="submit" disabled={isSubmitting}>
        {isSubmitting ? 'Submitting...' : 'Submit'}
      </button>
    </form>
  );
}
```

## Notes for Implementation

1. All form submissions are stored in the CRM system with:
   - user_id = 1 (assigned to admin)
   - created_by = 3
   - source = 'website'
2. Make sure to include proper error handling in your frontend code.
3. The API will validate the required fields and return appropriate error messages.
4. For security reasons, consider implementing CSRF protection for production use.

If you have any questions or need further assistance, please contact the development team. 