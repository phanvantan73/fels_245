<table class="table table-bordered">
    <thead>
    <tr>
        <th class="text-capitalize">
            @lang('message.profiles.tests')
        </th>
        <th class="text-capitalize">
            @lang('message.profiles.created_at')
        </th>
        <th class="text-capitalize">
            @lang('message.profiles.score')
        </th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse ($tests as $test)
        <tr>
            <td class="text-capitalize">
                @lang('message.profiles.your_test', ['num' => $test->id])
            </td>
            <td>
                {{ $test->created_at }}
            </td>
            <td>
                {{ $test->result->score }}
            </td>
            <td class="text-center text-capitalize">
                <a href="{{ route('profile.show.test', ['id' => $test->id]) }}" class="btn btn-outline-info btn-block">
                    @lang('message.profiles.detail')
                </a>
            </td>
        </tr>
    @empty
        <h1>
            @lang('message.notFoundError')
        </h1>
    @endforelse
    </tbody>
</table>
