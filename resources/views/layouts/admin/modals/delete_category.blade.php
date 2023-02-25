<!-- Modal -->
<div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header badge-danger w-100 text-center">
        <h5 class="modal-title w-100 text-center">
            <i class="fas fa-trash">
            Hapus Kategori
            </i>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('categories.destroy', 'test')}}" method="POST" enctype="multipart/form-data">
            {{method_field('delete')}}
            @csrf
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="id" value="">
                <p> <font color="red"><h5 align="center"><b>Apakah kamu yakin ingin menghapus kategori ini?</b></h5></font></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </form>
    </div>
    </div>
</div>  