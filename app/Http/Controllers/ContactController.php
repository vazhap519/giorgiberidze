<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\ServiceRequestMail;

class ContactController extends Controller
{

    public function sendContact(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => ['required','regex:/^5\d{8}$/'],
            'message' => 'required|string'
        ]);

        try {

            Mail::to('info@eyenet.ge')
                ->send(new ContactFormMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Message could not be sent'
            ], 500);

        }

    }


    public function sendService(Request $request)
    {

        $data = $request->validate([
            'service' => 'required|string',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => ['required','regex:/^5\d{8}$/'],
            'message' => 'nullable|string'
        ]);

        Mail::to('info@eyenet.ge')
            ->send(new ServiceRequestMail($data));

        return response()->json([
            'success' => true
        ]);
    }

}
