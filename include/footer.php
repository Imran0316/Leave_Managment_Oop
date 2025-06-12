   <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggles = [{
                    toggle: "deptToggle",
                    dropdown: "deptDropdown",
                    chevron: "deptChevron"
                },
                {
                    toggle: "EmpToggle",
                    dropdown: "EmpDropdown",
                    chevron: "EmpChevron"
                },
                {
                    toggle: "levToggle",
                    dropdown: "levDropdown",
                    chevron: "levChevron"
                },
                {
                    toggle: "lmToggle",
                    dropdown: "lmDropdown",
                    chevron: "lmChevron"
                }
            ];

            toggles.forEach(item => {
                const toggleEl = document.getElementById(item.toggle);
                const dropdownEl = document.getElementById(item.dropdown);
                const chevronEl = document.getElementById(item.chevron);

                toggleEl.addEventListener("click", function(e) {
                    e.preventDefault();
                    const isOpen = dropdownEl.style.display === "block";
                    dropdownEl.style.display = isOpen ? "none" : "block";
                    chevronEl.classList.toggle("rotate", !isOpen);
                });
            });

            feather.replace(); // Initialize feather icons if you're using them
        });
    </script>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
        integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>