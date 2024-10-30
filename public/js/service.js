// // public/js/service.js

// $(document).ready(function() {
//     // Token CSRF
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     // Handle Create
//     $('#addServiceBtn').click(function() {
//         $('#serviceModal').modal('show');
//         $('#serviceForm').trigger('reset');
//         $('#modalTitle').text('Tambah Layanan Baru');
//         $('#submitBtn').data('action', 'create');
//     });

//     // Handle Submit Form (Create & Update)
//     $('#serviceForm').on('submit', function(e) {
//         e.preventDefault();
//         let formData = new FormData(this);
//         let action = $('#submitBtn').data('action');
//         let url = action === 'create' ? '/service' : '/service/' + $('#serviceId').val();
//         let method = action === 'create' ? 'POST' : 'PUT';

//         $.ajax({
//             url: url,
//             method: method,
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function(response) {
//                 if(response.success) {
//                     $('#serviceModal').modal('hide');
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Berhasil!',
//                         text: 'Data layanan berhasil disimpan'
//                     }).then(() => {
//                         location.reload();
//                     });
//                 }
//             },
//             error: function(xhr) {
//                 let errors = xhr.responseJSON.errors;
//                 Object.keys(errors).forEach(function(key) {
//                     $(`#${key}_error`).text(errors[key][0]);
//                 });
//             }
//         });
//     });

//     // Handle Edit
//     $('.edit-btn').click(function() {
//         let id = $(this).data('id');
//         let type = $(this).data('type');
        
//         $.get(`/service/${id}`, function(data) {
//             $('#serviceModal').modal('show');
//             $('#modalTitle').text('Edit Layanan');
//             $('#submitBtn').data('action', 'update');
//             $('#serviceId').val(id);
//             $('#tipe_layanan').val(type);
//             $('#nama_layanan').val(data.nama_layanan);
//             $('#deskripsi').val(data.deskripsi);
//             // Reset error messages
//             $('.error-message').text('');
//         });
//     });

//     // Handle Delete
//     $('.delete-btn').click(function() {
//         let id = $(this).data('id');
//         let type = $(this).data('type');

//         Swal.fire({
//             title: 'Apakah Anda yakin?',
//             text: "Data yang dihapus tidak dapat dikembalikan!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#d33',
//             cancelButtonColor: '#3085d6',
//             confirmButtonText: 'Ya, hapus!',
//             cancelButtonText: 'Batal'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 $.ajax({
//                     url: `/service/${id}`,
//                     method: 'DELETE',
//                     data: {
//                         tipe_layanan: type
//                     },
//                     success: function(response) {
//                         if(response.success) {
//                             Swal.fire(
//                                 'Terhapus!',
//                                 'Data layanan berhasil dihapus.',
//                                 'success'
//                             ).then(() => {
//                                 location.reload();
//                             });
//                         }
//                     }
//                 }); }
//         });
//     });
// });