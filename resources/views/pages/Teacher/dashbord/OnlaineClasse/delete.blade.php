 {{-- start delete Students --}}
 <div class="modal fade" id="Delete_online_classe{{$online_classe->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('online_classe.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('online_classe_trans.delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ trans('online_classe_trans.Warning_online_classe') }}</p>
                <input type="hidden" name="id"  value="{{$online_classe->id}}">
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('Students_trans.delete') }}</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
{{-- End delete Students --}}