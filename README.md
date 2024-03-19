
# Law Firm X

## About Project

This is a simple CRM project that helps profile clients for the company. The project was built with Laravel, Inertia and Vue.



## Installation instructions.

1. Clone this repository:
   ```bash
   git clone projectUrl
   ```

2. Install Composer dependencies
     ```bash
      composer install
   ```
3. Install Package dependencies
     ```bash
      npm install
   ```

4. Create a copy of the .env.example file and rename it to .env
     ```bash
      cp .env.example .env
   ```

5. Generate an application key
     ```bash
      php artisan key:generate
   ```
6. Configure your .env file with your database credentials, mail and other settings.

7. Run the database migrations
    ```bash
      php artisan migrate
   ```
8. Create a default profile image: Place a suitable default profile image in the directory storage/app/public/default/profile.png. This image will be used as the default profile image for clients. You can use any image of your choice and ensure it's accessible to your application.
   
9. To make this image accessible from the web, run the following command to create a symbolic link from the public directory to the storage directory:
    ```bash
      php artisan storage:link
   ```
10. Run the scheduler to test notification for the 3 days Reminder .
    I decided to use a command for this aspect of the project, Qeued jobs can be used.
    ```bash
    //To run the schedule immediately
      php artisan schedule:run

    //To run the schedule in the background
    php artisan schedule:work

   ```
   ```
11. Start the Laravel development server
   ```bash
      php artisan serve
   ```
12. Compile assets and start the Laravel frontend
   ```bash
      npm run dev
   ```

You are good to go.


## Design Explaination

The app can create/profile a client using the Client Model. The profile image uses a default image on creation, and it can be updated from the client list page. The app also provides the ability to view different clients that have been profiled, with the ability to filter by last name.

## Conclucion

This app can be further improved and updated. Future enhancements could include adding authorization to give permissions for updating and deleting clients.



