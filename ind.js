document.addEventListener('DOMContentLoaded', function() {
    const toggleSubmenus = document.querySelectorAll('.toggle-submenu');
    
    toggleSubmenus.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            parent.classList.toggle('active');
        });
    });
    
    // Auto-generate rows if the table exceeds 3 rows
    const INITIAL_MAX_ROWS = 3; // Start with 3 rows
    const tbody = document.querySelector('.body-table tbody');
    
    function generateRows() {
        const currentRows = tbody.querySelectorAll('tr').length;
        
        // If current rows exceed 3, add more rows dynamically
        if (currentRows > INITIAL_MAX_ROWS) {
            const rowsToAdd = currentRows - INITIAL_MAX_ROWS;
            
            for (let i = 0; i < rowsToAdd; i++) {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="Usn"></td>
                    <td class="Name"></td>
                    <td class="GradeStrand"></td>
                    <td class="Date"></td>
                    <td class="In"></td>
                    <td class="Out"></td>
                `;
                tbody.appendChild(newRow);
            }
        }
    }
    
    generateRows();
});

 const tableBodyScroll = document.querySelector('.table-body-scroll');
    const tableScrollWrapper = document.querySelector('.table-scroll-wrapper');
    const headerTable = document.querySelector('.header-table');
    
    // When body scrolls horizontally, move header
    tableBodyScroll.addEventListener('scroll', function() {
        headerTable.style.transform = 'translateX(-' + this.scrollLeft + 'px)';
    });
    
    // When wrapper scrolls horizontally, move header too
    tableScrollWrapper.addEventListener('scroll', function() {
        headerTable.style.transform = 'translateX(-' + this.scrollLeft + 'px)';
    });

