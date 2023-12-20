<div class="position-absolute right-4">
    <div class="dropdown dropdown-left">
        <label tabindex="0" class="m-1 cursor-pointer text-xl"><iconify-icon
                icon="pepicons-pop:dots-y"></iconify-icon></label>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-black rounded-box w-24">
            @can('delete', $tweet)
                <li>
                    <a href="{{ route('tweets.destroy', $tweet->id) }}"
                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="text-danger"
                        data-confirm-delete="true">Hapus</a>

                    <form id="delete-form" action="{{ route('tweets.destroy', $tweet->id) }}" method="post"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
            @endcan
            @can('update', $tweet)
                <li><a href="{{ route('tweets.edit', $tweet->id) }}" class="text-warning">Edit</a>
                </li>
            @endcan
            @cannot('view', $tweet)
                <li><button onclick="report_{{ $tweet->id }}.showModal()" class="text-warning">Report</button>
                </li>
            @endcannot

        </ul>
    </div>

</div>
