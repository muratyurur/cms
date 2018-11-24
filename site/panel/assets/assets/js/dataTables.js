$(document).ready(function() {
    $('#datatable-responsive').DataTable({
        "language": {
            "url": "http://localhost/cms/site/panel/assets/assets/js/dtTurkish.json",
        },
        "responsive": true,
        "ordering": false,
        "bsort": false
    });
} );