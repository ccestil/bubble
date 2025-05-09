<div class="nav-header">
    <h1>Bubbleworks </h1>
</div>

<nav class="nav-links">
    <ul>
        <li><a href="/home">Dashboard</a></li>
        <li><a href="/transactions">Transactions</a></li>
        <li><a href="/customers">Customers</a></li>
        <li><a href="/employees">Employees</a></li>
        <li><a href="/inventory">Inventory</a></li>
        <li><a href="/services">Services</a></li>
    </ul>
</nav>


<form action="{{ route('admin.logout') }}" method="POST" style="display: flex; align-items: center; margin-left: auto;">
    @csrf
    <button type="submit" style="background: linear-gradient(to right, #ff8a00, #e52e71); color: white; padding: 0.5rem 1rem; border: none; border-radius: 1.5rem; cursor: pointer; font-size: 0.9rem; font-weight: 500; height: 30px; display: flex; align-items: center; gap: 0.3rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2); transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="13" y2="12"></line>
        </svg>
        LOGOUT
    </button>
</form>