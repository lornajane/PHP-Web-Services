<?php

if(empty($_GET)) {
    
?>

<form name="search" method="get">
    Category: 
    <select name="category">
        <option value="entertainment">Entertainment</option>
        <option value="sport">Sport</option>
        <option value="technology">Technology</option>
    </select> <br />

    Rows per page: <select name="rows">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
    </select> <br />

    <input type="submit" value="Search" />
</form>

<?php
} else {
    echo "Wonderfully filtered search results";
}

