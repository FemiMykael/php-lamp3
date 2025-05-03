$(document).ready(function() {
    // Set the book ID field as readonly on page load
    let id = $("input[name*='book_id']");
    id.attr("readonly", "readonly");

    // Handle the edit button click event
    $(".btnedit").click(function(e) {
        let textvalues = displayData(e);

        // Get the form input fields
        let bookname = $("input[name*='book_name']");
        let bookpublisher = $("input[name*='book_publisher']");
        let bookprice = $("input[name*='book_price']");

        // Populate the input fields with the retrieved data
        id.val(textvalues[0]);
        bookname.val(textvalues[1]);
        bookpublisher.val(textvalues[2]);
        bookprice.val(textvalues[3].replace("$", "")); // Remove the dollar sign from price
    });

    // Function to display data for the selected book
    function displayData(e) {
        let id = 0;
        const td = $("#tbody tr td");
        let textvalues = [];

        // Loop through each td element to find matching data by dataset id
        for (const value of td) {
            if (value.dataset.id == e.target.dataset.id) {
                textvalues[id++] = value.textContent;
            }
        }
        return textvalues;
    }
});
