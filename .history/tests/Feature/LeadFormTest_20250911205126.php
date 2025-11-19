<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadFormTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test contact form submission.
     *
     * @return void
     */
    public function test_contact_form_submission()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'message' => $this->faker->paragraph,
            'businessType' => $this->faker->company,
            'location' => $this->faker->city,
            'formType' => 'contact'
        ];

        $response = $this->postJson('/api/leads/form', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'status' => 'success',
                     'message' => 'Lead successfully created'
                 ]);

        $this->assertDatabaseHas('leads', [
            'email' => $data['email'],
            'name' => $data['name'],
            'user_id' => 1, // Assigned to admin by default
        ]);
        
        // Check that the lead was created
        $lead = Lead::where('email', $data['email'])->first();
        $this->assertNotNull($lead);
        $this->assertNotNull($lead->description);
    }

    /**
     * Test partner form submission.
     *
     * @return void
     */
    public function test_partner_form_submission()
    {
        $data = [
            'fullName' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'cityState' => $this->faker->city . ', ' . $this->faker->state,
            'applyingFor' => 'Channel Sales Partner',
            'businessBackground' => $this->faker->paragraph,
            'message' => $this->faker->paragraph,
            'formType' => 'partner'
        ];

        $response = $this->postJson('/api/leads/form', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'status' => 'success',
                     'message' => 'Lead successfully created'
                 ]);

        $this->assertDatabaseHas('leads', [
            'email' => $data['email'],
            'name' => $data['fullName'],
            'user_id' => 1, // Assigned to admin by default
        ]);
        
        // Check that the lead was created
        $lead = Lead::where('email', $data['email'])->first();
        $this->assertNotNull($lead);
        $this->assertNotNull($lead->description);
    }

    /**
     * Test blueprint form submission.
     *
     * @return void
     */
    public function test_blueprint_form_submission()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'businessType' => $this->faker->company,
            'formType' => 'blueprint'
        ];

        $response = $this->postJson('/api/leads/form', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'status' => 'success',
                     'message' => 'Lead successfully created'
                 ]);

        $this->assertDatabaseHas('leads', [
            'email' => $data['email'],
            'name' => $data['name'],
            'user_id' => 1, // Assigned to admin by default
        ]);
        
        // Check that the lead was created
        $lead = Lead::where('email', $data['email'])->first();
        $this->assertNotNull($lead);
        $this->assertNotNull($lead->description);
    }

    /**
     * Test validation errors.
     *
     * @return void
     */
    public function test_validation_errors()
    {
        $data = [
            'name' => '',
            'email' => 'invalid-email',
            'formType' => 'contact'
        ];

        $response = $this->postJson('/api/leads/form', $data);

        $response->assertStatus(422)
                 ->assertJson([
                     'status' => 'error',
                     'message' => 'Validation error'
                 ]);
    }
} 