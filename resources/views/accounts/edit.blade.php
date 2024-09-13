<x-layout title="Edit">
    <body>
    <form action="{{ url('/accounts/' . $account->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $account->name }}" name="name">
        <input type="email" value="{{ $account->email }}" name="email">
        <input type="password" value="{{ $account->password }}" name="password">
        <input type="submit" value="Submit">
    </form>
    </body>
</x-layout>
