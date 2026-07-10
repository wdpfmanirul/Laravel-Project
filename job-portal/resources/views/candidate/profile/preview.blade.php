<x-app-layout>

{{-- ======================================================
     CV FINAL PREVIEW — "Editorial Luxury" redesign
     ====================================================== --}}

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap');

    :root {
        --ink:      #0f1117;
        --fog:      #f4f3ef;
        --paper:    #fefefe;
        --gold:     #c9a84c;
        --gold-lt:  #f0e6c8;
        --steel:    #2c3e50;
        --mist:     #8a9bb0;
        --rule:     #e2ddd5;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'DM Sans', sans-serif;
        background: var(--fog);
    }

    /* ── Top action bar ── */
    .action-bar {
        position: sticky;
        top: 0;
        z-index: 50;
        background: rgba(244,243,239,0.85);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--rule);
        padding: 14px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .action-bar .page-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--ink);
        letter-spacing: .02em;
    }
    .action-bar .page-title span {
        display: block;
        font-family: 'DM Sans', sans-serif;
        font-size: .72rem;
        font-weight: 400;
        color: var(--mist);
        letter-spacing: .06em;
        text-transform: uppercase;
        margin-top: 1px;
    }
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        border-radius: 8px;
        font-size: .82rem;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all .2s;
        text-decoration: none;
    }
    .btn-dark {
        background: var(--ink);
        color: #fff;
    }
    .btn-dark:hover { background: #232831; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(0,0,0,.18); }
    .btn-gold {
        background: var(--gold);
        color: #fff;
    }
    .btn-gold:hover { background: #b8963e; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(201,168,76,.35); }
    .btn-bar { display: flex; gap: 10px; }

    /* ── CV sheet ── */
    .cv-wrap {
        max-width: 900px;
        margin: 44px auto 80px;
        padding: 0 20px;
    }
    .cv-sheet {
        background: var(--paper);
        border: 1px solid var(--rule);
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,.04), 0 20px 60px rgba(0,0,0,.07);
    }

    /* ── Header band ── */
    .cv-header {
        background: var(--steel);
        padding: 48px 52px 44px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 28px;
        position: relative;
        overflow: hidden;
    }
    .cv-header::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 260px; height: 260px;
        border-radius: 50%;
        background: rgba(201,168,76,.07);
    }
    .cv-header::after {
        content: '';
        position: absolute;
        bottom: -40px; left: 200px;
        width: 160px; height: 160px;
        border-radius: 50%;
        background: rgba(255,255,255,.03);
    }
    .cv-header-text { position: relative; z-index: 1; }
    .cv-name {
        font-family: 'Playfair Display', serif;
        font-size: 2.7rem;
        font-weight: 900;
        color: #fff;
        letter-spacing: .01em;
        line-height: 1.05;
    }
    .cv-role {
        font-size: .82rem;
        font-weight: 500;
        color: var(--gold);
        letter-spacing: .18em;
        text-transform: uppercase;
        margin-top: 8px;
    }
    .cv-contacts {
        display: flex;
        flex-wrap: wrap;
        gap: 6px 22px;
        margin-top: 18px;
    }
    .cv-contacts a,
    .cv-contacts span {
        font-size: .78rem;
        color: rgba(255,255,255,.65);
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }
    .cv-contacts span svg, .cv-contacts a svg { width:13px; height:13px; opacity:.7; }
    .cv-photo {
        position: relative; z-index: 1;
        width: 128px;
        height: 128px;
        border-radius: 6px;
        object-fit: cover;
        border: 3px solid rgba(201,168,76,.5);
        flex-shrink: 0;
        box-shadow: 0 8px 28px rgba(0,0,0,.3);
    }

    /* ── Body grid ── */
    .cv-body {
        display: grid;
        grid-template-columns: 260px 1fr;
    }

    /* ── Left sidebar ── */
    .cv-left {
        background: #f8f7f3;
        padding: 44px 32px;
        border-right: 1px solid var(--rule);
        display: flex;
        flex-direction: column;
        gap: 36px;
    }
    .cv-section-label {
        font-size: .64rem;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: 18px;
        padding-bottom: 8px;
        border-bottom: 1px solid var(--gold-lt);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .cv-section-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--gold-lt);
    }

    /* Identity list */
    .identity-list { display: flex; flex-direction: column; gap: 14px; }
    .identity-item .label {
        font-size: .6rem;
        font-weight: 600;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--mist);
        margin-bottom: 2px;
    }
    .identity-item .value {
        font-size: .82rem;
        font-weight: 600;
        color: var(--ink);
    }

    /* Skills */
    .skill-tags { display: flex; flex-wrap: wrap; gap: 7px; }
    .skill-tag {
        font-size: .71rem;
        font-weight: 500;
        color: var(--steel);
        background: #fff;
        border: 1px solid #dddad3;
        border-radius: 4px;
        padding: 4px 10px;
        letter-spacing: .02em;
    }

    /* Address */
    .address-text {
        font-size: .8rem;
        color: #555;
        line-height: 1.65;
    }
    .address-text strong {
        display: block;
        font-size: .72rem;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--ink);
        margin-top: 4px;
    }

    /* ── Right content ── */
    .cv-right {
        padding: 44px 48px;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    .cv-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--ink);
        letter-spacing: .04em;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .cv-section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--rule);
    }

    /* Experience */
    .exp-item {
        position: relative;
        padding-left: 20px;
        border-left: 2px solid var(--gold-lt);
        margin-bottom: 26px;
    }
    .exp-item:last-child { margin-bottom: 0; }
    .exp-item::before {
        content: '';
        position: absolute;
        left: -5px; top: 5px;
        width: 8px; height: 8px;
        border-radius: 50%;
        background: var(--gold);
    }
    .exp-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 4px;
        gap: 12px;
    }
    .exp-title {
        font-size: .88rem;
        font-weight: 700;
        color: var(--ink);
    }
    .exp-date {
        font-size: .68rem;
        font-weight: 600;
        color: var(--gold);
        background: var(--gold-lt);
        padding: 3px 9px;
        border-radius: 3px;
        white-space: nowrap;
        letter-spacing: .04em;
        text-transform: uppercase;
    }
    .exp-company {
        font-size: .72rem;
        font-weight: 600;
        color: var(--mist);
        text-transform: uppercase;
        letter-spacing: .1em;
        margin-bottom: 8px;
    }
    .exp-desc {
        font-size: .8rem;
        color: #5a6070;
        line-height: 1.7;
    }

    /* Education */
    .edu-grid { display: flex; flex-direction: column; gap: 14px; }
    .edu-card {
        background: #f8f7f3;
        border: 1px solid var(--rule);
        border-radius: 6px;
        padding: 16px 20px;
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 6px 16px;
        align-items: start;
    }
    .edu-degree {
        font-size: .85rem;
        font-weight: 700;
        color: var(--ink);
    }
    .edu-year {
        font-size: .72rem;
        font-weight: 700;
        color: var(--mist);
        text-align: right;
        margin-top: 2px;
    }
    .edu-institution {
        font-size: .73rem;
        color: #666;
        font-weight: 500;
        grid-column: 1 / -1;
    }
    .edu-meta {
        font-size: .67rem;
        font-weight: 700;
        color: var(--gold);
        letter-spacing: .08em;
        text-transform: uppercase;
        grid-column: 1 / -1;
        margin-top: 4px;
    }

    /* Certifications */
    .cert-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .cert-card {
        background: #f0ede4;
        border-radius: 6px;
        padding: 14px 16px;
        border-left: 3px solid var(--gold);
    }
    .cert-title {
        font-size: .8rem;
        font-weight: 700;
        color: var(--ink);
        text-transform: uppercase;
        letter-spacing: .04em;
        line-height: 1.3;
    }
    .cert-inst {
        font-size: .72rem;
        color: #666;
        margin-top: 4px;
    }
    .cert-meta {
        font-size: .67rem;
        font-weight: 700;
        color: var(--gold);
        letter-spacing: .06em;
        text-transform: uppercase;
        margin-top: 6px;
    }

    /* No content placeholder */
    .empty-note { font-size: .8rem; color: var(--mist); font-style: italic; }

    /* ── Print styles ── */
    @media print {
        .no-print       { display: none !important; }
        body            { background: white !important; }
        .cv-wrap        { margin: 0; padding: 0; max-width: 100%; }
        .cv-sheet       { box-shadow: none !important; border: none !important; border-radius: 0 !important; }
        .cv-header      { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .cv-left        { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .action-bar     { display: none; }
    }
</style>

<div class="no-print">
    <!-- Sidebar -->
    @include('candidate.layouts.sidebar')
</div>

<!-- Action bar (no-print) -->
<div class="action-bar no-print" style="margin-left:256px;">
    <div class="page-title">
        Final Preview
        <span>Review your profile before submission</span>
    </div>
    <div class="btn-bar">
        <button onclick="window.print()" class="btn btn-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Print CV
        </button>
        <form action="{{ route('candidate.profile.submit') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-gold">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Final Submit
            </button>
        </form>
    </div>
</div>

<!-- CV Sheet -->
<div class="cv-wrap" style="margin-left:276px;">
    <div class="cv-sheet">

        {{-- ───── HEADER ───── --}}
        <div class="cv-header">
            <div class="cv-header-text">
                <div class="cv-name">{{ auth()->user()->name }}</div>
                <div class="cv-role">Professional Candidate</div>
                <div class="cv-contacts">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        {{ $profile->phone }}
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        {{ auth()->user()->email }}
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $profile->district }}, Bangladesh
                    </span>
                </div>
            </div>
            @if($profile->photo)
                <img src="{{ asset('storage/' . $profile->photo) }}" class="cv-photo" alt="Profile photo">
            @endif
        </div>

        {{-- ───── BODY ───── --}}
        <div class="cv-body">

            {{-- LEFT COLUMN --}}
            <div class="cv-left">

                {{-- Identity --}}
                <div>
                    <div class="cv-section-label">Identity</div>
                    <div class="identity-list">
                        <div class="identity-item">
                            <div class="label">Father's Name</div>
                            <div class="value">{{ $profile->father_name }}</div>
                        </div>
                        <div class="identity-item">
                            <div class="label">Mother's Name</div>
                            <div class="value">{{ $profile->mother_name }}</div>
                        </div>
                        <div class="identity-item">
                            <div class="label">Gender / Marital Status</div>
                            <div class="value">{{ $profile->gender }} / {{ $profile->marital_status }}</div>
                        </div>
                        <div class="identity-item">
                            <div class="label">Nationality</div>
                            <div class="value">{{ $profile->nationality }}</div>
                        </div>
                    </div>
                </div>

                {{-- Skills --}}
                <div>
                    <div class="cv-section-label">Skills</div>
                    <div class="skill-tags">
                        @foreach(explode(',', $profile->skills) as $skill)
                            @if(trim($skill))
                                <span class="skill-tag">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- Address --}}
                <div>
                    <div class="cv-section-label">Address</div>
                    <div class="address-text">
                        {{ $profile->present_address }}
                        <strong>{{ $profile->thana }}, {{ $profile->district }}</strong>
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="cv-right">

                {{-- Work Experience --}}
                <section>
                    <div class="cv-section-title">Work Experience</div>
                    @forelse($experiences as $exp)
                        <div class="exp-item">
                            <div class="exp-top">
                                <div class="exp-title">{{ $exp->job_title }}</div>
                                <div class="exp-date">
                                    {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} —
                                    {{ $exp->currently_working ? 'Present' : \Carbon\Carbon::parse($exp->end_date)->format('M Y') }}
                                </div>
                            </div>
                            <div class="exp-company">{{ $exp->company_name }} &middot; {{ $exp->employment_type }}</div>
                            <div class="exp-desc">{{ $exp->responsibilities }}</div>
                        </div>
                    @empty
                        <p class="empty-note">No experience added yet.</p>
                    @endforelse
                </section>

                {{-- Education --}}
                <section>
                    <div class="cv-section-title">Education</div>
                    <div class="edu-grid">
                        @foreach($educations as $edu)
                            <div class="edu-card">
                                <div class="edu-degree">{{ $edu->qualification_level }} in {{ $edu->group_subject }}</div>
                                <div class="edu-year">{{ $edu->passing_year }}</div>
                                <div class="edu-institution">{{ $edu->institution_name }}</div>
                                <div class="edu-meta">CGPA: {{ $edu->cgpa_grade }} &nbsp;|&nbsp; Board: {{ $edu->board_university ?? 'N/A' }}</div>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Certifications / Trainings --}}
                @if($profile->trainings->count() > 0)
                <section>
                    <div class="cv-section-title">Certifications</div>
                    <div class="cert-grid">
                        @foreach($profile->trainings as $tr)
                            <div class="cert-card">
                                <div class="cert-title">{{ $tr->training_title }}</div>
                                <div class="cert-inst">{{ $tr->institution }}</div>
                                <div class="cert-meta">{{ $tr->duration }} &nbsp;·&nbsp; {{ $tr->passing_year }}</div>
                            </div>
                        @endforeach
                    </div>
                </section>
                @endif

            </div>
        </div>{{-- /cv-body --}}

    </div>{{-- /cv-sheet --}}
</div>{{-- /cv-wrap --}}

</x-app-layout>