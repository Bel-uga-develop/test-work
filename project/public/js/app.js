document.addEventListener('DOMContentLoaded', () => {
    const selectSort = document.getElementById('select-sort');
    if (selectSort) {
        selectSort.addEventListener('change', (e) => {
            const sortVal = e.target.value;
            const url = new URL(window.location.href);
            url.searchParams.set('sort', sortVal);
            // Reset to first page on sort change
            url.searchParams.set('page', '1');
            window.location.href = url.toString();
        });
    }
});
