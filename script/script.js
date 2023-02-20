function sortTable(col) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("appointments-table");
    switching = true;

    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[col];
        y = rows[i + 1].getElementsByTagName("TD")[col];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
        }
        }
        if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        }
    }
    }

    $(document).ready(function(){
        // get the table rows
        var rows = $("#appointments-table tbody tr");

        // set up the search input
        $("#search-input").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        // filter the table rows
        rows.filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        });
    });

    let countSpans = document.querySelectorAll(".Count");
    countSpans.forEach(function(countSpan) {
        let targetCount = parseInt(countSpan.textContent); // get the target count
        let counter = 0;
        var interval = setInterval(function() {
        if (counter >= targetCount) {
            clearInterval(interval);
        } else {
            counter += 1;
            countSpan.textContent = counter;
        }
        }, 200);
    });