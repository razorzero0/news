@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/bberkay/lightweight-wysiwyg-editor@main/src/wysiwyg.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {});
        }
        if (document.getElementById("default-table2") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table2", {
                perPage: 15,
            });
        }

        if (document.getElementById("add-item-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTableItem = new simpleDatatables.DataTable("#add-item-table", {});
        }
    </script>
@endpush
