<div>
        <div class="w-100">
            <h5 class="fs-5" style="font-weight: 400;">Badges</h5>

            <!-- Badge -->
            <div>
                <span class="{{ $badge_greenstatus_enabled ? "" : "opacity-25" }}">
                    <img class="me-1" src="{{ asset('images/badges/badge-leaf.png') }}" height="25"
                        alt="Badge" class="badge-image">
                    Green Status <span class="text-muted">- 100 points</span>
                </span>
            </div>

            <!-- Badge -->
            <div>
                <span class="{{ $badge_fulldetails_enabled ? '' : 'opacity-25' }} ">
                    <img class="me-1" src="{{ asset('images/badges/badge-bio.png') }}" height="25"
                        alt="Badge" class="badge-image">
                    Green Profile <span class="text-muted">- full profile page</span>
                </span>
            </div>

            <!-- Badge -->
            <div>
                <span class="opacity-25">
                    <img class="me-1" src="{{ asset('images/badges/badge-recycle.png') }}" height="25"
                        alt="Badge" class="badge-image">
                    Coming Soon <span class="text-muted">- More badges soon!</span>
                </span>
            </div>
        </div>
</div>
