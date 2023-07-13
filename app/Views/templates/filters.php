<div class="sidebar">
    <div class="sidebar-item">
        <h4>Filter Options</h4>
        <form id="filterForm" method="post" action="/dashboard">
            <div class="filter-item">
                <h5>Bedrooms</h5>
                <input type="number" name="bedrooms" class="form-control" placeholder="Enter number of bedrooms">
            </div>
            <div class="filter-item">
                <h5>Bathrooms</h5>
                <input type="number" name="bathrooms" class="form-control" placeholder="Enter number of bathrooms">
            </div>
            <div class="filter-item">
                <h5>Price</h5>
                <input type="range" name="price" min="0" max="10000" step="100" value="0" class="form-range">
            </div>
            <div class="filter-item">
                <h5>Location</h5>
                <input type="text" name="location" class="form-control" placeholder="Enter location">
            </div>
            <div class="filter-item">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </form>
    </div>
</div>
