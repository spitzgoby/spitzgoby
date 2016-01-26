@extends('layouts.sidebar')

@section('content')
        <div id="name">
            <h1>TOM LEU</h1>
        </div>
        <div id="profile">
            <p>
                I am a software developer from
                <a class="map-image link-orange" href="https://maps.google.com/maps?q=Birmingham,+AL&z=6">Birmingham, Alabama</a>.
                Most of my experience is developing on the iOS platform, but I
                also like to build web apps and play around with big data
                analytics.
            </p>
            <p>
                Most of my work is open source and published under the MIT
                license. In addition to the <a class="link-orange" href="https://github.com/spitzgoby/spitzgoby">source code</a>
                for this site, you can also find the code for my
                <a class="link-orange" href="https://github.com/spitzgoby/EvCal">iOS calendar app</a>,
                Cocoapods packages I have built, and several grad school projects.
                I encourage you to clone, pull, and fork my repos. I really
                appreciate feedback.
            </p>
            <p>
                Before coding I studied math at The University of Alabama and
                spent almost 5 years living in
                <a class="map-image link-orange" href="https://maps.google.com/maps?q=Beijing,+China&z=4">China</a>
                teaching calculus and studying Chinese.
            </p>
        </div>
        <div id="resume">
            <h1 class="header-jumbo text-center">Resume</h1>
            <div class="resume-gallery text-center">
                <a class="resume-page"
                   href="img/Thomas_Leu_Resume_pg1.png"
                   title="Thomas Leu Resume Page 1">
                    <img class="resume-thumbnail" src="img/tn_Thomas_Leu_Resume_pg1.png" alt="Resume Page 1">
                </a>
                <a class="resume-page"
                   href="img/Thomas_Leu_Resume_pg2.png"
                   title="Thomas Leu Resume Page 2">
                    <img class="resume-thumbnail" src="img/tn_Thomas_Leu_Resume_pg2.png" alt="Resume Page 2">
                </a>
            </div>
            <a class="link-blue" href="about/resume">
                <h3 class="text-center"><i class="fa fa-download"></i> Download as PDF</h3>
            </a>
        </div>
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('.resume-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') +'<small>Copyright Thomas Leu '+ new Date().getFullYear() +'</small>';
                    }
                }
            });

            $('.map-image').magnificPopup({
                type: 'iframe'
            })
        });
    </script>
@stop