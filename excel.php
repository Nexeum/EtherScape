<html>
<script src="https://jspreadsheet.com/v9/jspreadsheet.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jspreadsheet.com/v9/jspreadsheet.css" type="text/css" />
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons" />
 
<script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@jspreadsheet/importer/dist/index.min.js"></script>
 
<div id='spreadsheet'></div>
 
<script>
// License for Formula Plugin
jspreadsheet.license = 'OGE0MDEyMjU2NjgzNTY3ZmY0MzFkNGRjMjM4N2M3MTU1YjM1NzhiNGQ5MmQyNjUzZThiZmVkZDBjMjVkM2UwODUyNWIwZDU5NDM0NjgyZDE2MjYxYWU1NmJiYjIzZDFiZTZkODAxOGUyNmRmZjc5NGZkM2NhYzZiYTJmMjdjN2UsZXlKdVlXMWxJam9pU25Od2NtVmhaSE5vWldWMElpd2laR0YwWlNJNk1UWTJOVEU1TkRBd05Dd2laRzl0WVdsdUlqcGJJbXB6Y0hKbFlXUnphR1ZsZEM1amIyMGlMQ0pqYjJSbGMyRnVaR0p2ZUM1cGJ5SXNJbXB6YUdWc2JDNXVaWFFpTENKamMySXVZWEJ3SWl3aWJHOWpZV3hvYjNOMElsMHNJbkJzWVc0aU9pSXpJaXdpYzJOdmNHVWlPbHNpZGpjaUxDSjJPQ0lzSW5ZNUlpd2lZMmhoY25Seklpd2labTl5YlhNaUxDSm1iM0p0ZFd4aElpd2ljR0Z5YzJWeUlpd2ljbVZ1WkdWeUlpd2lZMjl0YldWdWRITWlMQ0pwYlhCdmNuUWlMQ0ppWVhJaUxDSjJZV3hwWkdGMGFXOXVjeUlzSW5ObFlYSmphQ0pkTENKa1pXMXZJanAwY25WbGZRPT0=';
 
// Add-on for Jspreasheet
jspreadsheet.setExtensions({ importer });
 
// Create the spreadsheets
jspreadsheet(document.getElementById('spreadsheet'), {
    toolbar: true,
    worksheets: [
        { minDimensions: [18, 30] },
    ],
});
</script>
</html>