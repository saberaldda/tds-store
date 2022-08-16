<!-- Button trigger modal -->
    @if (isset($button))
        <button type="button" class="btn btn-sm btn-{{ $color }}" data-toggle="modal" data-target="#exampleModalCenter{{ @$id }}">{{ __($process) }}</button>
    @else
        <button type="button" title="{{ __($process) }}" class="btn btn-sm btn-{{ $color }}" data-toggle="modal" data-target="#exampleModalCenter{{ @$id }}"><i class="fas {{ $icon }}"></i></button>
    @endif

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{ @$id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Confirm') }} <b class="text-danger">{{ __($process) }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                {{ __('Are you sure?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('Confirm') }}</button>
            </div>
        </div>
    </div>
</div>
