<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeClientNotification;
use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $lastName = $request->query("lastName");
        $clients = Client::query();

        if ($lastName && $lastName != "undefined") {
            $clients->where('last_name', 'like', '%' . $lastName . '%');
        }

        $clients = $clients->orderByDesc('created_at')->get();

        // $clients = Client::orderByDesc('created_at')->get();
        return Inertia::render("Clients/Index", [
            'clients' => $clients->map(function ($client) {
                return [
                    "id" => $client->id,
                    "first_name" => $client->first_name,
                    "last_name" => $client->last_name,
                    "email" => $client->email,
                    "primary_legal_counsel" => $client->primary_legal_counsel,
                    "date_of_birth" => $client->date_of_birth,
                    "date_of_profiling" => $client->date_of_profiling,
                    "profile_image" => asset('storage/' . $client->profile_image),
                    "created_at" => $client->created_at->toDateTimeString(), // Assuming 'created_at' is a Carbon instance
                ];
            }),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render("Clients/Create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientRequest $request)
    {
        //
        $clientRequest = $request->validated();

        try{
            $image = "default/profile.png";
            if ($request->file("profile_image")) {
                $image = $request->file('profile_image')->store('clients', 'public');
            }
           

            $client = Client::create([
                    "first_name" => $clientRequest['first_name'],
                    "last_name" => $clientRequest['last_name'],
                    "email" => $clientRequest['email'],
                    "primary_legal_counsel" => $clientRequest['primary_legal_counsel'],
                    "date_of_birth" => $clientRequest['date_of_birth'],
                    "date_of_profiling" => $clientRequest['date_of_profiling'],
                    "case_details" => $clientRequest['case_details'],
                    "profile_image" => $image
                ]);

            //This can be done with events and listners;
            $client->notify(new WelcomeClientNotification($client->first_name));

            return redirect()->route('client.create')->with('success', 'Client data saved.');

        }catch(\Exception $e) {
                
            Log::error("Error : " . $e->getMessage());
            return redirect()->route('client.create')->with('error', 'An error occurred while saving data.');
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        return Inertia::render("Clients/View", [
            "client" => $client,
            "profile_image" => asset('storage/' . $client->profile_image)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
        return Inertia::render("Clients/Edit", [
            "client" => $client,
            "profile_image" => asset('storage/' . $client->profile_image)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $clientRequest = $request->validated();

        try {
            $image = $client->profile_image;
            if ($request->file("profile_image")) {
                if($client->profile_image != "default/profile.png"){
                    Storage::delete("public/" . $client->profile_image);
                }
                $image = $request->file('profile_image')->store('clients', 'public');
            }


            $client->update([
                "first_name" => $clientRequest['first_name'],
                "last_name" => $clientRequest['last_name'],
                "email" => $clientRequest['email'],
                "primary_legal_counsel" => $clientRequest['primary_legal_counsel'],
                "date_of_birth" => $clientRequest['date_of_birth'],
                "date_of_profiling" => $clientRequest['date_of_profiling'],
                "case_details" => $clientRequest['case_details'],
                "profile_image" => $image
            ]);
            return redirect()->route('client.edit',["client"=>$client->id])->with('success', 'Client data updated.');

        } catch (\Exception $e) {

            Log::error("Error : " . $e->getMessage());
            return redirect()->route('client.edit', ["client" => $client->id])->with('error', 'An error occurred while updating data.');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {

        try{

            if($client->profile_image && $client->profile_image != "default/profile.png"){
                Storage::delete("public/" . $client->profile_image);
            }
            $client->delete();

            return redirect()->route('client.create')->with('success', 'Client data deleted.');

        } catch (\Exception $e) {

            Log::error("Error : " . $e->getMessage());
            return redirect()->route('client.create')->with('error', 'An error occurred while deleting data.');

        }

    }
}
