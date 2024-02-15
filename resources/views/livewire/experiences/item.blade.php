<tr>
    <td>{{$loop->index + 1}}</td>
    <td>{{$item->company_name}}</td>
    <td>{{$item->job_title}}</td>
    <td>{{$item->start_date}}</td>
    <td>{{$item->end_date}}</td>
    <td>{{$item->currently_employed}}</td>
    <td>{{$item->description}}</td>
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