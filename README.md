# Tennis Reservation System

A collaborative project by Samantha Miller and Kevin Hartnett for CPSC-348 at UMW.  
We created a website for the UMW Tennis Center to electronically schedule and manage tennis court reservations.

## Sources

* http://www.w3schools.com/howto/howto_html_include.asp provides a useful script to add an HTML file (menu.html) to each desired webpage.

##Our SQL database login info:

Hosted on CS server

User: smiller3

Pass: apple

DB Name: cpsc348_smiller3

##General Site Information

Our website uses multiple tables for maximum efficiency.

We designed our website to have minimal strain on the server but a high level of security. Our website relies on a calendar called FullCalendar Scheduler. It’s written in JQuery and solely clientside. (More information: http://fullcalendar.io/docs/scheduler/) There are multiple methods of calendar data input, so we chose to use the built in JSON Array Interpreter for ours. We have a file called “evt.json” in the document root. This is an array of event objects. Each one has a title, id, startTime, endTime, and resourceId [resourceId is the court being reserved]. Our calendar uses the client’s browser to read the locally cached evt.json file to render the events appropriately on the calendar.

When a user first visits the page, they get a generic welcome page along with a static (readonly) view of the calendar with users’ reservations on it. We have a login and registration page for users. Our website uses PHP Session Variables to keep track of who is logged in and with what information. This means that when someone logs in, we start a session. A session is also started on each page of our website and authentication checks are done (if a user’s ID is not set or less than 1, we assume they have not logged in). If there is no authentication, users never get to see the reservation page or the account page. An error page is displayed asking them to log in.

Another important part of the signup methodology is user security. Obviously, our website would not be a big hacking target. Nevertheless, smaller sites are regularly data mined to get cleartext passwords. Because rainbow tables as well as documented hash collision have made MD5 almost as useless as databases with clear text, we did some research on modern password storage. We found that from PHP 5.5 on, there is a password_hash function as well as a password_verify function. When a user signs up, we encrypt it using the PHP_DEFAULT constant option for password security. Then when a user signs in, we compare the password to that hash. This makes it almost impossible for someone to find the cleartext of a password even if the database is breached through SQL injection.

When a user registers for our website, we create an entry in our table called ‘tennis_users’ with all of their pertinent information. In a future implementation, we would extend our account.php page to have options to alter the account and save it to the database. Currently, the account page is readonly. When a user logs in, we use their name as the title of their reservations. We have a reservation script only for logged in members that takes in the date/time and converts it into a form that is acceptable to FullCalendar. Our website has full access control, so people who are logged in cannot see the registration and login pages, and people who are not logged in cannot reserve courts or see the accounts page.

The backbone of our website was made from scratch in HTML5 and CSS. Our images are completely public domain and free to use without attribution. We have a few code snippets we found online but have left comments in our code of the source. We used references, namely StackOverflow, to figure out the picky JSON format of FullCalendar as well as how to perform some more intricate FullCalendar operations.


###What we accomplished:

We made our website in HTML5 and CSS without a template. Our theme is totally from scratch, other than the background image, which we got online. We made a basic site map, and then we put in the proper pages (main, account, reserve, registration, login, calendar, etc). We researched and found an appropriate calendar plugin for clients to use. We then found out ways to manipulate it into receiving information from a server. We architected SQL databases to store user info and logins and devised an appropriate password security scheme. We made forms in HTML with local (JavaScript) validation. However, because this is a public-facing website, we also added serverside (PHP) checks on what was being put in and sanitized it. We then made scripts to process this information and connect to our SQL database tables and added full access control via Session Variables to our website. Finally, we came up with a scheme to show our calendar’s reservations in the most efficient way possible. We made it so that when a user enters acceptable reservation information, the information is shown in both the SQL database and the JSON file the calendar runs on, so it shows up live in the calendar as well as within our database so the user can see it on their accounts page.

Some things we did NOT get done include: adding an administrator control panel, adding reservation modification and cancellation, and making our calendar more “responsive.” We originally had plans to do much more when our group was larger. However, the first Kenny turned out to be just auditing the class and did not ever show up again. The second Kenny left the class without warning, and we had thought he was working on his part (the database tier) for a long time before we learned he had just dropped the class entirely. Therefore, we only had 2 people involved, but we spent a lot of time and did what we could. We simply ran out of time, but we prioritized so that we would have a working website, good and secure signup and login scripts, a solid reservation input system, and a calendar that displays correctly and accepts a JSON feed correctly.


###Sources: 

Easy CSS Backgrounds: https://css-tricks.com/perfect-full-page-background-image/ 

Input Focus: http://jsfiddle.net/simevidas/CXUpm/1/

JSON/PHP integration: http://stackoverflow.com/questions/7895335/append-data-to-a-json-file-with-php

