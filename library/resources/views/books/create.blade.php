@extends('layout')

@section('content')
    <form method="post" action="/books">
        {{ csrf_field() }}
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" placeholder="Enter ISBN" required autofocus>

        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" required>

        <label for="author_firstname">Author's First Name</label>
        <input type="text"  name="author_firstname" placeholder="Author's First Name" required>

        <label for="author_lastname">Author's Last Name</label>
        <input type="text"  name="author_lastname" placeholder="Author's Last Name" required>

        <label for="release_date">Release Date</label>
        <input type="date"  name="release_date" required>

        <label for="distributor">Distributor</label>
        <input type="text"  name="distributor" placeholder="Distributor" required>

        <label for="edition">Edition</label>
        <input type="number"  name="edition" placeholder="Edition" required>

        <label for="genre">Genre</label>
        <select  name="genre">
            <option value="" disabled selected>Choose genre...</option>
            <option value="Biografie & Waargebeurd">Biografie & Waargebeurd</option>
            <option value="Chicklit & Romantiek">Chicklit & Romantiek</option>
            <option value="Essays & Columns">Essays & Columns</option>
            <option value="Familie- & Streekromans">Familie- & Streekromans</option>
            <option value="Fantasy & Sciencefiction">Fantasy & Sciencefiction</option>
            <option value="Historische Romans">Historische Romans</option>
            <option value="Literaire Thrillers">Literaire Thrillers</option>
            <option value="Literatuur & Klassiekers">Literatuur & Klassiekers</option>
            <option value="Misdaad & Complot">Misdaad & Complot</option>
            <option value="Poëzie">Poëzie</option>
            <option value="Romans">Romans</option>
            <option value="Spanning">Spanning</option>
            <option value="Thrillers">Thrillers</option>
            <option value="Verhalenbundels">Verhalenbundels</option>
            <option value="Verhalende Non-Fictie">Verhalende Non-Fictie</option>
            <option value="Wetenschap">Wetenschap</option>
        </select>

        <label for="discription">Discription</label>
        <textarea  name="discription" rows="10"></textarea>

        <label for="language">Language (default: Nederlands)</label>
        <input type="text"  name="language" placeholder="Language">

        <label for="minimum_age">Minimum Age (default: 0)</label>
        <input type="number"  name="minimum_age" placeholder="Minimum Age">

        <label for="amount">Amount (default: 1)</label>
        <input type="number"  name="amount" placeholder="Amount">

        <input type="submit" value="Create" />
    </form>

    @include('sections.errors')

@endsection