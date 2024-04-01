Laravel Project using Github OAuth Login and Export Excel file from json input



#Installation guide

1. clone the github project
   git clone https://github.com/AmitMaharjan04/LaravelExport.git

2. Must have composer installed in the PC if not using docker for setup
   Note: this project contains some npm and node for future websockets implementation. (install npm and node as well)

3. enter 'composer install' in the current project directory and for future commands as well

4. enter 'php artisan migrate'
   If error occured, change the .env file and put appropriate DB connection,host,port,database,username and password and type 'php artisan config:cache'

5. make the localhost port be 8086 as the github oauth is on 8086 port i.e http://127.0.0.1:8086
   and also change the GITHUB_CALLBACK_URL port number to 8086 if it is different and clear cache of configuration

6. go the the localhost:8086/ page for login webpage
   
7. enable the queue by 'php artisan queue:work' in the terminal for the export into excel file in background

   Note: page reload is done for client side checking of queue is completed or not which lead into multiple queue of same export to be generated
   i.e autorefresh 3 time = 4 queue export which can be later optimized into using Laravel echo and Pusher for client and server side communication.

   I had used the event listeners, pusher and echo but faced some issue to maintain communication from client to server resulting in use of page reload to check for the completion of queue.
