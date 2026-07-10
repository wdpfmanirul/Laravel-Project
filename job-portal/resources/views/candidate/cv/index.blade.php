<x-app-layout>

{{-- ══════════════════════════════════════════════════════
     CV PREVIEW  ·  "Midnight Forest" Edition
     Layout  : Exact mirror of uploaded reference image
               Left sidebar (dark) + Right content (white)
     Fonts   : Syne (display/headings) + Literata (body)
     Palette : Charcoal #1c2431 · Sage #4a7c6f · Cream #f5f2ec · Gold #e8b84b
══════════════════════════════════════════════════════ --}}

<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Literata:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap');

:root {
    --dark:      #1c2431;
    --dark-2:    #243040;
    --sage:      #4a7c6f;
    --sage-lt:   #d6ebe6;
    --gold:      #e8b84b;
    --gold-lt:   #fdf3d7;
    --cream:     #f5f2ec;
    --white:     #ffffff;
    --ink:       #1a1e28;
    --body-col:  #3c4258;
    --muted:     #7b8499;
    --rule:      #e4e1d9;
    --page-bg:   #e9e6de;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: 'Literata', serif;
    background: var(--page-bg);
    color: var(--ink);
}

/* ══ ACTION BAR ══ */
.action-bar {
    position: sticky;
    top: 0; z-index: 100;
    background: var(--dark);
    padding: 11px 36px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 16px rgba(0,0,0,.35);
}
.bar-brand {
    font-family: 'Syne', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: #fff;
    letter-spacing: .04em;
}
.bar-brand span {
    display: block;
    font-family: 'Literata', serif;
    font-size: .68rem;
    font-weight: 300;
    color: rgba(255,255,255,.45);
    letter-spacing: .1em;
    text-transform: uppercase;
    margin-top: 1px;
}
.bar-btns { display: flex; gap: 10px; }
.btn {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 8px 18px;
    border-radius: 5px;
    font-family: 'Syne', sans-serif;
    font-size: .74rem; font-weight: 600;
    cursor: pointer; border: none;
    transition: all .17s; text-decoration: none;
    letter-spacing: .04em;
}
.btn-ghost {
    background: transparent;
    border: 1.5px solid rgba(255,255,255,.3);
    color: rgba(255,255,255,.85);
}
.btn-ghost:hover { background: rgba(255,255,255,.08); border-color: rgba(255,255,255,.6); }
.btn-sage {
    background: var(--sage);
    color: #fff;
    box-shadow: 0 3px 12px rgba(74,124,111,.4);
}
.btn-sage:hover { background: #3d6b5f; transform: translateY(-1px); box-shadow: 0 5px 18px rgba(74,124,111,.45); }

/* ══ PAGE ══ */
.page-wrap {
    margin-left: 256px;
    padding: 36px 28px 72px;
}
.cv-sheet {
    max-width: 860px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 272px 1fr;
    border-radius: 4px;
    overflow: hidden;
    box-shadow:
        0 2px 4px rgba(0,0,0,.08),
        0 12px 40px rgba(0,0,0,.14),
        0 40px 80px rgba(0,0,0,.08);
}

/* ══════════════════
   LEFT SIDEBAR
══════════════════ */
.cv-left {
    background: var(--dark);
    padding: 0 0 44px;
    display: flex;
    flex-direction: column;
    position: relative;
}

/* Sage top accent bar */
.cv-left::before {
    content: '';
    display: block;
    width: 100%; height: 5px;
    background: linear-gradient(90deg, var(--sage), var(--gold));
    flex-shrink: 0;
}

/* Photo zone */
.photo-zone {
    padding: 32px 28px 24px;
    text-align: center;
    position: relative;
}
.photo-frame {
    width: 110px; height: 110px;
    border-radius: 6px;
    overflow: hidden;
    margin: 0 auto 18px;
    border: 3px solid var(--sage);
    box-shadow: 0 6px 24px rgba(0,0,0,.4);
    background: var(--dark-2);
}
.photo-frame img { width:100%; height:100%; object-fit: cover; display:block; }
.photo-frame-placeholder {
    width:100%; height:100%;
    display:flex; align-items:center; justify-content:center;
    font-family:'Syne',sans-serif;
    font-size:2.2rem; font-weight:800;
    color: var(--sage); opacity:.7;
}
.cv-left-name {
    font-family: 'Syne', sans-serif;
    font-size: 1.25rem;
    font-weight: 800;
    color: #fff;
    line-height: 1.15;
    text-transform: uppercase;
    letter-spacing: .04em;
}
.cv-left-job {
    font-family: 'Literata', serif;
    font-size: .74rem;
    font-weight: 300;
    font-style: italic;
    color: var(--gold);
    margin-top: 6px;
    letter-spacing: .05em;
}

/* Sidebar section */
.sb-section { padding: 22px 28px 0; }
.sb-section + .sb-section { margin-top: 4px; }

.sb-head {
    font-family: 'Syne', sans-serif;
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--sage);
    padding-bottom: 8px;
    margin-bottom: 14px;
    border-bottom: 1px solid rgba(74,124,111,.35);
    display: flex; align-items: center; gap: 8px;
}
.sb-head::before {
    content: '';
    width: 14px; height: 2px;
    background: var(--gold);
    flex-shrink: 0;
}

/* Contact items */
.contact-list { display: flex; flex-direction: column; gap: 10px; }
.contact-item {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: .75rem;
    color: rgba(255,255,255,.6);
    line-height: 1.4;
}
.contact-icon {
    width: 22px; height: 22px;
    border-radius: 4px;
    background: rgba(74,124,111,.2);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.contact-icon svg { width:11px; height:11px; color: var(--sage); }

/* Skills */
.skill-list { display: flex; flex-direction: column; gap: 10px; }
.skill-item {}
.skill-name {
    font-size: .74rem;
    color: rgba(255,255,255,.75);
    margin-bottom: 5px;
    display: flex; justify-content: space-between;
}
.skill-bar {
    height: 3px;
    background: rgba(255,255,255,.1);
    border-radius: 2px;
    overflow: hidden;
}
.skill-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--sage), var(--gold));
    border-radius: 2px;
}

/* Simple dot list (languages, hobbies) */
.dot-list { display: flex; flex-direction: column; gap: 8px; }
.dot-item {
    font-size: .76rem;
    color: rgba(255,255,255,.6);
    display: flex; align-items: center; gap: 10px;
}
.dot-item::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--gold);
    flex-shrink: 0;
}

/* ══════════════════
   RIGHT CONTENT
══════════════════ */
.cv-right {
    background: var(--white);
    padding: 0 0 44px;
}

/* Top objective strip */
.obj-strip {
    background: var(--cream);
    padding: 24px 36px;
    border-bottom: 1px solid var(--rule);
}
.obj-text {
    font-size: .82rem;
    color: var(--body-col);
    line-height: 1.8;
    font-style: italic;
    font-weight: 300;
}

/* Section in right column */
.rt-section { padding: 30px 36px 0; }
.rt-section + .rt-section { padding-top: 26px; }

.rt-head {
    font-family: 'Syne', sans-serif;
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--dark);
    padding-bottom: 10px;
    margin-bottom: 20px;
    border-bottom: 2px solid var(--dark);
    display: flex; align-items: center; gap: 10px;
}
.rt-head-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--sage);
    flex-shrink: 0;
}

/* Experience rows — exactly like reference: date col + content col */
.exp-table { display: flex; flex-direction: column; gap: 20px; }
.exp-row { display: grid; grid-template-columns: 90px 1fr; gap: 0 18px; }
.exp-dates {
    padding-top: 2px;
    text-align: right;
}
.exp-year-range {
    font-family: 'Syne', sans-serif;
    font-size: .68rem;
    font-weight: 700;
    color: var(--sage);
    letter-spacing: .04em;
    white-space: nowrap;
}
.exp-content {}
.exp-position {
    font-family: 'Syne', sans-serif;
    font-size: .84rem;
    font-weight: 700;
    color: var(--dark);
    text-transform: uppercase;
    letter-spacing: .04em;
}
.exp-co {
    font-size: .72rem;
    color: var(--sage);
    font-weight: 500;
    margin-top: 2px;
    font-style: italic;
}
.exp-body {
    font-size: .78rem;
    color: var(--body-col);
    line-height: 1.72;
    margin-top: 8px;
    font-weight: 300;
    white-space: pre-line;
}

/* Education — same date col layout */
.edu-table { display: flex; flex-direction: column; gap: 18px; }
.edu-row { display: grid; grid-template-columns: 90px 1fr; gap: 0 18px; align-items: start; }
.edu-years {
    text-align: right;
    padding-top: 2px;
}
.edu-yr {
    font-family: 'Syne', sans-serif;
    font-size: .68rem;
    font-weight: 700;
    color: var(--muted);
    display: block;
    letter-spacing: .03em;
}
.edu-content {}
.edu-degree {
    font-family: 'Syne', sans-serif;
    font-size: .84rem;
    font-weight: 700;
    color: var(--dark);
    text-transform: uppercase;
    letter-spacing: .04em;
}
.edu-inst {
    font-size: .72rem;
    color: var(--sage);
    font-weight: 500;
    font-style: italic;
    margin-top: 2px;
}
.edu-meta {
    font-size: .72rem;
    color: var(--muted);
    margin-top: 6px;
    line-height: 1.65;
    font-weight: 300;
}

/* Declaration */
.declaration {
    margin: 30px 36px 0;
    border-top: 1px solid var(--rule);
    padding-top: 24px;
}
.decl-text {
    font-size: .73rem;
    color: var(--muted);
    font-style: italic;
    line-height: 1.7;
    margin-bottom: 24px;
}
.sig-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}
.sig-date { font-size: .78rem; font-weight: 500; color: var(--ink); }
.sig-box { text-align: center; }
.sig-line { width: 160px; height: 1px; background: var(--muted); margin: 0 auto 5px; }
.sig-lbl { font-family: 'Syne', sans-serif; font-size: .62rem; font-weight: 600; text-transform: uppercase; letter-spacing: .12em; color: var(--muted); }

/* ══ PRINT ══ */
@media print {
    .no-print, .action-bar { display: none !important; }
    body { background: white !important; }
    .page-wrap { margin: 0; padding: 0; }
    .cv-sheet { max-width: 100%; box-shadow: none; border-radius: 0; }
    .cv-left,
    .cv-left::before,
    .photo-frame,
    .skill-fill,
    .contact-icon,
    .sb-head::before,
    .dot-item::before { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
}
</style>

{{-- Sidebar --}}
<div class="no-print">
    @include('candidate.layouts.sidebar')
</div>

{{-- Action bar --}}
<div class="action-bar no-print" style="margin-left:256px;">
    <div class="bar-brand">
        CV Preview
        <span>Review &amp; Submit your profile</span>
    </div>
    <div class="bar-btns">
        <button onclick="window.print()" class="btn btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Print / PDF
        </button>
        <form action="{{ route('candidate.profile.submit') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-sage">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Final Submit
            </button>
        </form>
    </div>
</div>

{{-- CV --}}
<div class="page-wrap">
<div class="cv-sheet">

    {{-- ══ LEFT SIDEBAR ══ --}}
    <div class="cv-left">

        {{-- Photo + Name --}}
        <div class="photo-zone">
            <div class="photo-frame">
                @if($profile->photo)
                    <img src="{{ asset('storage/'.$profile->photo) }}" alt="Photo">
                @else
                    <div class="photo-frame-placeholder">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                @endif
            </div>
            <div class="cv-left-name">{{ auth()->user()->name }}</div>
            <div class="cv-left-job">{{ $profile->current_job_title ?? 'Professional Candidate' }}</div>
        </div>

        {{-- Profile / Contact --}}
        <div class="sb-section">
            <div class="sb-head">Profile</div>
            <div class="contact-list">
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </span>
                    <span>{{ $profile->present_address }}, {{ $profile->thana }}, {{ $profile->district }}</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </span>
                    <span>{{ auth()->user()->email }}</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </span>
                    <span>{{ $profile->phone }}</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </span>
                    <span>{{ $profile->date_of_birth ?? '—' }}</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </span>
                    <span>{{ $profile->gender }} · {{ $profile->marital_status }} · {{ $profile->nationality }}</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </span>
                    <span>Father: {{ $profile->father_name ?? '—' }}</span>
                </div>
            </div>
        </div>

        {{-- Skills --}}
        <div class="sb-section">
            <div class="sb-head">Skills</div>
            <div class="skill-list">
                @php $skillList = array_filter(array_map('trim', explode(',', $profile->skills))); $skillWidths = [90,78,85,70,88,75,82,68]; $i=0; @endphp
                @foreach($skillList as $sk)
                    <div class="skill-item">
                        <div class="skill-name"><span>{{ $sk }}</span></div>
                        <div class="skill-bar">
                            <div class="skill-fill" style="width:{{ $skillWidths[$i % count($skillWidths)] }}%"></div>
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach
            </div>
        </div>

        {{-- Certifications in sidebar (if any) --}}
        @if($profile->trainings->count() > 0)
        <div class="sb-section">
            <div class="sb-head">Certifications</div>
            <div class="dot-list">
                @foreach($profile->trainings as $tr)
                    <div class="dot-item">{{ $tr->training_title }}</div>
                @endforeach
            </div>
        </div>
        @endif

    </div>{{-- /cv-left --}}

    {{-- ══ RIGHT CONTENT ══ --}}
    <div class="cv-right">

        {{-- Objective strip --}}
        <div class="obj-strip">
            <p class="obj-text">
                {{ $profile->bio ?? 'A highly motivated and goal-oriented individual seeking a challenging position in a professional environment where I can utilize my skills and experience to contribute meaningfully to the organisation\'s growth and success.' }}
            </p>
        </div>

        {{-- Professional Experience --}}
        <div class="rt-section">
            <div class="rt-head"><span class="rt-head-dot"></span>Professional Experience</div>
            <div class="exp-table">
                @forelse($profile->experiences as $exp)
                    <div class="exp-row">
                        <div class="exp-dates">
                            <span class="exp-year-range">
                                {{ \Carbon\Carbon::parse($exp->start_date)->format('Y') }}<br>
                                — {{ $exp->currently_working ? 'Now' : \Carbon\Carbon::parse($exp->end_date)->format('Y') }}
                            </span>
                        </div>
                        <div class="exp-content">
                            <div class="exp-position">{{ $exp->job_title }}</div>
                            <div class="exp-co">{{ $exp->company_name }} · {{ $exp->employment_type }}</div>
                            <div class="exp-body">{{ $exp->responsibilities }}</div>
                        </div>
                    </div>
                @empty
                    <p style="font-size:.8rem;color:var(--muted);font-style:italic;">No professional experience listed.</p>
                @endforelse
            </div>
        </div>

        {{-- Education --}}
        <div class="rt-section">
            <div class="rt-head"><span class="rt-head-dot"></span>Education</div>
            <div class="edu-table">
                @foreach($profile->educations as $edu)
                    <div class="edu-row">
                        <div class="edu-years">
                            <span class="edu-yr">{{ $edu->passing_year }}</span>
                        </div>
                        <div class="edu-content">
                            <div class="edu-degree">{{ $edu->qualification_level }} in {{ $edu->group_subject }}</div>
                            <div class="edu-inst">{{ $edu->institution_name }}</div>
                            <div class="edu-meta">GPA: {{ $edu->cgpa_grade }} &nbsp;·&nbsp; {{ $edu->board_university ?? 'N/A' }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Declaration --}}
        <div class="declaration">
            <p class="decl-text">I hereby declare that all the information provided above is true and accurate to the best of my knowledge and belief.</p>
            <div class="sig-row">
                <div class="sig-date">Date: ______________________</div>
                <div class="sig-box">
                    <div class="sig-line"></div>
                    <div class="sig-lbl">Applicant's Signature</div>
                </div>
            </div>
        </div>

    </div>{{-- /cv-right --}}

</div>{{-- /cv-sheet --}}

<p class="no-print" style="text-align:center;font-size:.68rem;color:#999;margin-top:22px;font-family:'Syne',sans-serif;letter-spacing:.08em;text-transform:uppercase;">
    © {{ date('Y') }} &nbsp;·&nbsp; Job Portal Professional Resume System
</p>
</div>{{-- /page-wrap --}}

</x-app-layout>