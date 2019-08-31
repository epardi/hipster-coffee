# hipster-coffee


This project is another clone of a theme I found: https://barista.edge-themes.com. It’s the first full-stack project I’ve attempted, and also the first time I’ve set up the hosting environment and registered a domain name for a site. For the back end, I used the “LEMP” stack (Linux Ubuntu, Nginx, MySQL, and PHP). I’m hosting it through Digital Ocean, and I got the domain name on GoDaddy.com. I decided to use the Laravel framework since it seems to be pretty popular, has a lot of helpful features, and encourages some best practices. On the front end, I tried the Bulma CSS framework; it utilizes flexbox, which is good for responsiveness, comes with no JavaScript so perhaps less unnecessary code, and I just thought it would be more productive to use a framework rather than write all the HTML/CSS from scratch. I also wrote a bit of vanilla JavaScript to make some of these Bulma components functional.

The blog section is the main dynamic part of the site. Of course, there’s also the login and registration system Laravel basically gives you out of the box. The rest is selected static content from the theme. The blog uses Laravel’s policy classes to manage the user permissions. If you’re logged in as Admin, you can do all the CRUD (Create, Read, Update, Delete) operations for posts, tags, and comments. Other logged-in users can comment on posts, reply to comments, and delete their own comments. Users can also upload an avatar image. I took a little inspiration from YouTube on the design of the post pages. You can like/dislike posts, sort comments a few different ways, and filter the posts by tag.

I’m sure my approaches for making these features were not the best or most efficient, but I think I learned a lot trying to implement them. I was using most of these technologies for the first time, so there was a bit of a learning curve. Overall, I thought Laravel was pretty easy to use and understand. I was pleasantly surprised at how productive I was with it. The MVC (Model View Controller) pattern is a lot clearer to me now after implementing it in Laravel. The Blade templating language was very convenient as well. It made my code more reusable and well organized. I look forward to learning much more about databases, Linux servers, and other things on the back end. As for Bulma, I enjoyed working with it as well. My only slight complaint is it felt a little too “bare bones” for a CSS framework. I know that’s by design and good to a point, but at times I was struggling to find classes to apply to my elements to get the desired result. I had to add on Bulma extensions and Bulma helpers, and I still had to write some of my own styling. Anyway, I guess it’s good to try different tools out.

I look forward to learning more PHP or other server-side language, as I learned just enough PHP to get this project done. The same goes for SQL and code related to it. I’m still a little shaky on foreign key constraints and more complicated relationships between models. Fortunately, I didn’t have many models or big tables to worry about this time. Learning a CMS might be the way to go from here. They seem to make developers really productive and provide a lot of value to clients. Developing custom themes or plugins might be an effective way to tie everything I’ve learned so far together and provide valuable products to people.
