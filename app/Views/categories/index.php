<!-- Views/categories/index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Quản lý danh mục</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class=" btn" href="#">Product <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="btn btn-primary" href="#">Category</a>
                    </li>
                </ul>
            </div>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATYAAACjCAMAAAA3vsLfAAABMlBMVEX///9ZWyn8/PyXpDiHqjYrKhb///2am5/ExceFqTKEqC59pBqApiT2+O+Dpyq6zZTq8ODS3rm0yoqpwXefuWGSsk7M2rBNTirt7e3z8/ObqTp4oAB8oxWSk5fm7dhVVijW19jg4ODNzc2hrUqos1glIxOYtVbd5srF1abIyM2OmjSDjjCjrk10fSqRnjZISCgfHBOOrkK2vnCur7Gnv3Nra2MjIgdxeilmbSfCw7+9waqiqHWQnSyUoybByZC1uKmRmmCkqJSCikl4hBtseBpXYAfY2dCGi2lDTQBXYBIuOAC6xIJbYiMQDQAxNBdmbyaVoEI9PRqFjz62trlpa0GhqmJTVhs1Nw1ZWUWUnVOQkXZgYjOxu32NkmVwejqChnUiKwDR0sZERDUDAACcm5RzdlG2Ot3kAAAJJ0lEQVR4nO2beX/bthmAKQmiRIqkTso6aFmyLVKOnMS05avL5nltrlm25iZRj21pt7bf/yvsBUCCp1w7v9WM2vf5R7wJPn4BvAASSUIQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEF+D+SBrMuwfuQ9si7HeuE56w6zLsha0fWslYdZl2SdENZQ2/3JB9ZQ273Jd5g2qQPWyqOsS7MuoLVPoTsKWRtmXZp1oTtiwcatbWddmnWhM+TWRuXy3vkXWZdmXRgNR561vfM/vfjzXyRJzrpIawBY6zBrexd/ffGsUOjt6lkXaQ0YbrOGTRpd/u3L6ZMCpVfPulCfPdyalP9i8dV0+uQZ07bTu8LB/J1sb0PDJnUuX748fepbK+zs7OzWJBlbuBXkIUkbdV+9fvN2AdZYFe31euBtf3+nnXXhPlvAGlTRi7+/nYM1Gmyg7OnWsx6E2/7u/pWMPWoaMGinVfToZL5YsCoK0nK55+Mp97a7O8i6hJ8j3Fonf3R9w6tob5rbotoOTntc2y6tqPGICzV5vxKMydMyf4AcOSfLkZ3QuVjrKnYTD37EZrhzThs26EU7Jyc31Np0DtJAW7F4MOfeDnev9HgZ5dRNcUgPvmCFNfZ7x2fqA5E2yhHSj8ZO/tZ0z1nDRjM26m3qScttPR+Dtw0eboeHh078+xuuawKu6yayYqeh9p1gt03olZHLbHqAwDUt/ymma86qA/8lertVsRrijY7b71uW1bdsW+0rM8cLxmbfguOmC6dMU4PN/uT/rWcV3SNeRdkI/mT8PMel5aa95UGxOL75x/4+03aYLNFAVRRtkgynat8gSsvfo1/oEJVd6eNUFFWlLSbEm6PBU2grMLAtq+kFoGNqhBjhBzdUojbZW4lqzfhLTcVq1CSprpEK7OpVi1/xKJSOhnzeg3m75dYWhV6hdwreiuOvvXA7jFZUutlUFSOtqsm2QqxwFZPqFaK4wQUz7kBmUm1FIdyurRqm//CqQbR66AmDCtF4lOka0ZrsXktjnRXVxt7m9EPv+I15t1n2rFFvt0uq7UmPja2e3NCK+tHzdnXoxG6FTzNSnzmDb66GbdYJIRVxu267xGiIi1WFy2Jq/JhsaESxQ4+sMW38lEosCDKwxA/42mSp3X+0YfR2abMcrIvq76m3Xo8PEwpbB8Xxhq/t6kM3eusqbTWbRVBIW3uiEbXl9aBS1SFEFdqaQptEiL+pmyCnUguewbWxXdDEarXjRaOINihR7dNFPIzOZmlzGHjrgrebW19bb3G9JXqFD7nYrau0VettIxRcQLveNKgFiiwRyUjT5tdXFjeTWkUxqsETQtocjRjhljak7RHZLEW85d8vb8cbBd/blA6xmLYPy9exO1dpI7JuEXUWOtKuQwX0LdSrq7S5XgsIZnXJVImWGm3xv0k22o5KcW/fQM0U8VbwhgoftpaXsTtXaHOa1EXkU9pt6Pb8rtGupWuTdKF2AB1xWxOtmRTR1lJUN9JwZqKtvEm9jYQ3Wf72JOStwEb0u99t5Zb/id25QltrQFMM2rqLbwNtbd4iyVINlCS10T6yqaoq//6Gw3pMVaQxoS5hUlG1SBOWjTYWbiFvUvf4BBKP28AbhBtYy715FbsxXZvO6hmh9S2sjVqgeqQGtORaSrQNZpbV8pKcCstmjVAaQ7XVdb1Wb1n9WVRSRtrypbA3aVSm2opB+wbevqZDhzfxsUu6tgmbaoKusxJMAYA2qWGwI7IixbUR4rrEUltslEDfUWct/oA1/d47QZvSahoVTWvEE8WMtEndTeFNym+X95i24vVctG/MWu59/L50bWRSB0CbEeTsVBt8OM1x2zShS4s2AfSoswZFC0Us3E3zEVchajzJyEqbNOLeOhJbIeXaDhYxa8vv47fFtbEvHNgTRkshmvgYqg3SC/p5rp6uLRTKNXPgDIBqqMuk2iAYdUVR1JijzLRJQ+at1BmVPW3j4lRYe8oH98uL+F0RbbI3vp55HwrjTugCPBdMG01TJzXWyt8ZbZD38V+9QsQo09NGRxLQREZqaXbaeHdaKpUZ28WDjYKwdsqt5f6ZWI6JRpusszGm6u1JMNA3w9pkWYFK12BW79Zm+NMDsyCN8bVBR0qMWeTyDLVJ70LaOt0z0Y0Ka286iXui2hp9+q1tMRatGkGnwKKNHlEUtn+nNsezIofTGKENBryKVg1fn6U2KaRt9K8XSWuvknOKEW1Vi4lQ6qIR14LxepXVtZrld413ajN9KTBsEJmtrw3aAheG8uGFoUy1sTTkHW3aLsSKX6H30bcWT3VZBkYnjrymvFmxBnBoYvkpAx1h0k6B7Xnf1VItPlXBtLE7ZUj6Qxke/E6sFq+kcL6q8ukjMXFEr9EN8Oa1oPQZNNepJf+ojwSM6UtHYO3yS6EtsHaRUqyaQicY6XG9TTSVZrmTiiLyA50mCzbd02eG6rKpHovXPxgxKIpXgSE7C2bWoIGsWkqlyoNHH5iGomptXdYHtgaBN9B55CmaalX5H0DWHWhEDds7lQGQhhztlf/91dRflu+dedaSuQc0ZURTCHyxAamqBpt0UsIFBUqlwWYuXXZaheo0sQy6QQ+rNEhmKlwG19HBkk3oNkhX/ck0u9Vq2dxu02xRzIlj2mzLNvlV8gSO8no6EacyW1/b3iydf6QrpVxbYO112iKRLDa8hSio6GJJyj8thy70F6vycvCExFMkcXH4ZSlb6fuZsPfD2wVf9KML87613PuHF27VHXc8SV6x/dDnPDayfPmSrTDzf88w960tu79+7x+Zzo/z+Zmn7ZmwlpZ6IGGKN8vF2SmrpfOcby2ZeiBRjk/GG2esccsJa4mRKBLn54Pi+GYOtVRYS0yEI0mG13R+cmsRWIuvuiApdKm24nhDWPsFO4P78F82ryu05TD1uBc/RLSlzBUhaRxdh7QlVqqQFYx+CrRh6nFv8kElxdTjAXx74mlbfo9Dqvvz809c2/KXrEuyXhxfM23JZSrkTsDbRm6JqcdDOb7ewNTjEzj+EeeKPoXzrAuwluB/TUMQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEGQPzz/A0EC7/f0UY6ZAAAAAElFTkSuQmCC" alt="logo lampart" width="200">
        </nav>
        <form method="GET">
            <input type="text" id="search-input" name="search" placeholder="Search" class="form-control my-3 text-center" placeholder="&#61442; Search" onkeydown="handleKeyPress(event)">
        </form>
        <div>
            <?php if ($searchKeyword) : ?>
                <span>Search found <?php echo $totalCategories; ?> results</span>
            <?php endif; ?>
            <a href="index.php?action=create" class="float-end"><i class="fas fa-plus-circle fs-3"></i></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category name</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php $this->categoryModel->showCategories($categories, 0, 0, $startIndex, $perPage, $count); ?>
                <?php $idx= $startIndex + 1; foreach ($categories as $category) : ?>
                <?php $idx++;
                endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation ">
                <ul class="pagination">
                    <?php if ($currentPage > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $currentPage - 1; ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                            <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $currentPage + 1; ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</body>
<script>
    function handleKeyPress(event) {
        if (event.keyCode === 13) { 
            event.preventDefault(); 
            performSearch();
        }
    }

    function performSearch() {
        var searchKeyword = document.getElementById('search-input').value;
        window.location.href = 'index.php?search=' + encodeURIComponent(searchKeyword);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>