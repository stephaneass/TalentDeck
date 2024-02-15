<tr>
    <td>{{$loop->index + 1}}</td>
    <td>{{$item->degree}}</td>
    <td>{{$item->institution}}</td>
    <td>{{$item->field_of_study}}</td>
    <td>{{$item->graduation_date}}</td>
    <td>{!!$item->formated_state!!}</td>
    <td>
        <!-- Buttons Group -->
        @if ($item->state == 'created')
            <button onclick="showDanger('Suspension', {{$item->id}}, 'Are you sure you want to suspend this education?')"
                 type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-thumb-down-line"></i></button>
        @else
            <button onclick="showValidate('Activation', {{$item->id}}, 'Are you sure you want to activate this education?')"
                 type="button" class="btn btn-success btn-icon waves-effect waves-light"><i class="ri-thumb-up-line"></i></button>            
        @endif
        <button class="btn btn-success" wire:click="edit({{$item->id}})"><i class="ri-edit-line align-bottom"></i> </button>
    </td>
</tr>