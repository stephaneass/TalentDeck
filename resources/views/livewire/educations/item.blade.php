<tr>
    <td>{{$loop->index + 1}}</td>
    <td>{{$item->degree}}</td>
    <td>{{$item->institution}}</td>
    <td>{{$item->field_of_study}}</td>
    <td>{{$item->graduation_date}}</td>
    <td>{!!$item->formated_state!!}</td>
    <td>
        <!-- Buttons Group -->
        @if ($item->state == 'actif')
            <button onclick="showDanger('Suspension de compte', {{$item->id}}, 'Êtes vous sûr de vouloir suspendre ce compte?')"
                 type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-thumb-down-line"></i></button>
        @else
            <button onclick="showValidate('Activation de compte', {{$item->id}}, 'Êtes vous sûr de vouloir réactiver ce compte?')"
                 type="button" class="btn btn-success btn-icon waves-effect waves-light"><i class="ri-thumb-up-line"></i></button>            
        @endif
        <button class="btn btn-success" wire:click="edit({{$item->id}})"><i class="ri-edit-line align-bottom"></i> </button>
    </td>
</tr>