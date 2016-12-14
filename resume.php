<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bree Carrick Resume</title>
        <!--Import CSS and generic meta tags-->
        <?php include 'modules/links.html'; ?>
    </head>
    <body style="padding-top: 50px">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery-1.11.3.min.js"></script>

        <div class="container-fluid" id="wrapper">
            <!--Include with PHP: navigation, header, about, resume, portfolio, blog, contact, and footer-->
            <?php 
                include 'modules/navbar.html';
                include 'modules/header.html'; 
            ?>
            <div class="container-fluid resume">
                <h3> Profile</h3>
                <hr>
                <p>Enthusiastic and proactive web design and development student with experience in front-end and back-end web design, graphic design, and working in a development team seeking an internship to get experience in the web design field.</p>
                <h3>Education</h3>
                <hr>
                <p><strong>Bachelors of Science in Web Design and Development</strong> <em>(Dec 2018) </em><br>
                    Emphasis in Web Development with a minor in Web Design <br>
                    Brigham Young University - Idaho <em>GPA - 3.9</em>&nbsp;</p>
                <p><strong>Associates of Science in General Studies</strong> (Dec 2015) <br>
                    Brigham Young University - Idaho <em>GPA - 3.9</em></p>
                <h3>Relevant Coursework</h3>
                <hr>
                <p>ART 110 - <strong>Design and Color</strong> [Grade Received: A] <br>
                    Completed weekly assignments about design elements and principles and color theory to prove skills mastery.</p>
                <p>B 250 - <strong>Web Business Creation</strong> [Grade Received: A]<br>
                    Created a business with a business model and an SEO optimized website with the ability to take payments to 		ensure the business would perform well.</p>
                <p>CIT 160 - <strong>Introduction to Programming</strong> [Grade Received: A]<br>
                    Created programs in the language of JavaScript to add usability to HTML elements.</p>
                <p>CIT 230 - <strong>Web Front-end Development</strong> [Grade Received: A]<br>
                    Created two websites using HTML, CSS, CSS media queries, techniques to improve SEO, and basic design
                    principles to create a user friendly, responsive website that search engines can find.</p>
                <p>CIT 380 - <strong>Project Management</strong> [Grade Received: B]<br>
                    Worked in a team and individually to complete projects using both linear and agile PM methods.</p>
                <p>ART 130 - <strong>Introduction to Graphic Design</strong> [Current Grade: A]<br>
                    Completing projects using Adobe Illustrator and design principles.</p>
                <p>COMM 130 -<strong> Visual Media</strong> [Current Grade: A]<br>
                    Creating fliers and other forms of media using Adobe programs such as InDesign, Photoshop, and Illustrator 		and design principles to effectively communicate a message to a specific audience.</p>
                <p>CIT 260 - <strong>Object Oriented Programming 1</strong> [Current Grade: A]<br>
                    Working with a development team using local and remote repositories, and the M-V-C pattern to create a text		based role playing game using the language of Java.</p>
                <p>CIT 336 - <strong>Web Back-end Development</strong> [Current Grade: A]<br>
                    Using the M-V-C pattern and the languages of PHP and MySQL to create an application within a website that 		has access to a database.</p>
                <h3>Work Experience</h3>
                <hr>
                <p><strong>Customer Service Sales Associate</strong> (Hillsboro, Oregon) 05/13 - 09/14 <br>
                <strong>Customer Service Sales Associate</strong> (Hillsboro, Oregon) 05/15 - 09/15<br>
                <strong>Nanny</strong> (Portland, Oregon) 06/15 - 09/15</p>
                </div>
            <?php 
            include 'modules/portfolio.html';
            include 'modules/footer.html';
            ?>
        </div>
    </body>
</html>
