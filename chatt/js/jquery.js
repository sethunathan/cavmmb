





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <link rel="dns-prefetch" href="https://assets-cdn.github.com">
  <link rel="dns-prefetch" href="https://avatars0.githubusercontent.com">
  <link rel="dns-prefetch" href="https://avatars1.githubusercontent.com">
  <link rel="dns-prefetch" href="https://avatars2.githubusercontent.com">
  <link rel="dns-prefetch" href="https://avatars3.githubusercontent.com">
  <link rel="dns-prefetch" href="https://github-cloud.s3.amazonaws.com">
  <link rel="dns-prefetch" href="https://user-images.githubusercontent.com/">



  <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/frameworks-a4bf54bef6fb.css" integrity="sha512-pL9Uvvb7LMqGC8jv/AyqZ7Ya6/HTgkhZzKwEsHOdsfaW2pr3fgzqjgKUSJfYkZ/klxwHrcu+tZwtNDTuw8vH6Q==" media="all" rel="stylesheet" />
  <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-d5aa84dde2d5.css" integrity="sha512-1aqE3eLVo8QJ3AfkPFnOFkzBmHnOY5YYQ89j1V4ke28LRSpxHMVQecd6/XxAp5lGLPPSEaFNhLyGKHQHiFXT7w==" media="all" rel="stylesheet" />
  
  
  <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/site-5ebe68400bf4.css" integrity="sha512-Xr5oQAv09afC+gaIiCo+EWGFwWrN4Nvd29gq8vHwmCfTFZEr+It0/krFTF32zVxwFVaSX9qyGLchP3QRDPUbiA==" media="all" rel="stylesheet" />
  

  <meta name="viewport" content="width=device-width">
  
  <title>ci-chat/jquery.js at master · abuzer/ci-chat · GitHub</title>
    <meta name="description" content="GitHub is where people build software. More than 28 million people use GitHub to discover, fork, and contribute to over 80 million projects.">
  <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
  <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">
  <meta property="fb:app_id" content="1401488693436528">

    
    <meta content="https://avatars1.githubusercontent.com/u/2954597?s=400&amp;v=4" property="og:image" /><meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="abuzer/ci-chat" property="og:title" /><meta content="https://github.com/abuzer/ci-chat" property="og:url" /><meta content="ci-chat - codeigniter facebook chat library" property="og:description" />

  <link rel="assets" href="https://assets-cdn.github.com/">
  
  <meta name="pjax-timeout" content="1000">
  
  <meta name="request-id" content="101C:51E9:104AAB4:1DBAC16:5AA1E23F" data-pjax-transient>
  

  <meta name="selected-link" value="repo_source" data-pjax-transient>

    <meta name="google-site-verification" content="KT5gs8h0wvaagLKAVWq8bbeNwnZZK1r1XQysX3xurLU">
  <meta name="google-site-verification" content="ZzhVyEFwb7w3e0-uOTltm8Jsck2F5StVihD0exw2fsA">
  <meta name="google-site-verification" content="GXs5KoUUkNCoaAZn7wPN-t01Pywp9M3sEjnt_3_ZWPc">
    <meta name="google-analytics" content="UA-3769691-2">

<meta content="collector.githubapp.com" name="octolytics-host" /><meta content="github" name="octolytics-app-id" /><meta content="https://collector.githubapp.com/github-external/browser_event" name="octolytics-event-url" /><meta content="101C:51E9:104AAB4:1DBAC16:5AA1E23F" name="octolytics-dimension-request_id" /><meta content="iad" name="octolytics-dimension-region_edge" /><meta content="iad" name="octolytics-dimension-region_render" />
<meta content="https://github.com/hydro_browser_events" name="hydro-events-url" />
<meta content="/&lt;user-name&gt;/&lt;repo-name&gt;/blob/show" data-pjax-transient="true" name="analytics-location" />




  <meta class="js-ga-set" name="dimension1" content="Logged Out">


  

      <meta name="hostname" content="github.com">
    <meta name="user-login" content="">

      <meta name="expected-hostname" content="github.com">
    <meta name="js-proxy-site-detection-payload" content="YmQyZDQxNzQ3MDMwOTc0NGNhMjg3NTI0ZTk2MjVjYjRlYWU4N2FkOTc4NTk4NDZhMzRlNmE3MDQzYmZjZDViN3x7InJlbW90ZV9hZGRyZXNzIjoiMTA2LjIwMy42Mi41NiIsInJlcXVlc3RfaWQiOiIxMDFDOjUxRTk6MTA0QUFCNDoxREJBQzE2OjVBQTFFMjNGIiwidGltZXN0YW1wIjoxNTIwNTU4NjY4LCJob3N0IjoiZ2l0aHViLmNvbSJ9">

    <meta name="enabled-features" content="UNIVERSE_BANNER,FREE_TRIALS,MARKETPLACE_INSIGHTS,MARKETPLACE_INSIGHTS_CONVERSION_PERCENTAGES,JS_ROLLUP">

  <meta name="html-safe-nonce" content="6c57ef4ad3af0e0939c2f65a34401e195840cbb8">

  <meta http-equiv="x-pjax-version" content="a26c884f0979d377881afc73aadb0bb1">
  

      <link href="https://github.com/abuzer/ci-chat/commits/master.atom" rel="alternate" title="Recent Commits to ci-chat:master" type="application/atom+xml">

  <meta name="description" content="ci-chat - codeigniter facebook chat library">
  <meta name="go-import" content="github.com/abuzer/ci-chat git https://github.com/abuzer/ci-chat.git">

  <meta content="2954597" name="octolytics-dimension-user_id" /><meta content="abuzer" name="octolytics-dimension-user_login" /><meta content="22466458" name="octolytics-dimension-repository_id" /><meta content="abuzer/ci-chat" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="22466458" name="octolytics-dimension-repository_network_root_id" /><meta content="abuzer/ci-chat" name="octolytics-dimension-repository_network_root_nwo" /><meta content="false" name="octolytics-dimension-repository_explore_github_marketplace_ci_cta_shown" />


    <link rel="canonical" href="https://github.com/abuzer/ci-chat/blob/master/js/chat/jquery.js" data-pjax-transient>


  <meta name="browser-stats-url" content="https://api.github.com/_private/browser/stats">

  <meta name="browser-errors-url" content="https://api.github.com/_private/browser/errors">

  <link rel="mask-icon" href="https://assets-cdn.github.com/pinned-octocat.svg" color="#000000">
  <link rel="icon" type="image/x-icon" class="js-site-favicon" href="https://assets-cdn.github.com/favicon.ico">

<meta name="theme-color" content="#1e2327">


  <meta name="u2f-support" content="true">

<link rel="manifest" href="/manifest.json" crossOrigin="use-credentials">

  </head>

  <body class="logged-out env-production page-blob">
    

  <div class="position-relative js-header-wrapper ">
    <a href="#start-of-content" tabindex="1" class="px-2 py-4 show-on-focus js-skip-to-content">Skip to content</a>
    <div id="js-pjax-loader-bar" class="pjax-loader-bar"><div class="progress"></div></div>

    
    
    



        <header class="Header header-logged-out  position-relative f4 py-3" role="banner">
  <div class="container-lg d-flex px-3">
    <div class="d-flex flex-justify-between flex-items-center">
      <a class="header-logo-invertocat my-0" href="https://github.com/" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
        <svg aria-hidden="true" class="octicon octicon-mark-github" height="32" version="1.1" viewBox="0 0 16 16" width="32"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg>
      </a>

    </div>

    <div class="HeaderMenu HeaderMenu--bright d-flex flex-justify-between flex-auto">
        <nav class="mt-0">
          <ul class="d-flex list-style-none">
              <li class="ml-2">
                <a href="/features" class="js-selected-navigation-item HeaderNavlink px-0 py-2 m-0" data-ga-click="Header, click, Nav menu - item:features" data-selected-links="/features /features/project-management /features/code-review /features/project-management /features/integrations /features">
                  Features
</a>              </li>
              <li class="ml-4">
                <a href="/business" class="js-selected-navigation-item HeaderNavlink px-0 py-2 m-0" data-ga-click="Header, click, Nav menu - item:business" data-selected-links="/business /business/security /business/customers /business">
                  Business
</a>              </li>

              <li class="ml-4">
                <a href="/explore" class="js-selected-navigation-item HeaderNavlink px-0 py-2 m-0" data-ga-click="Header, click, Nav menu - item:explore" data-selected-links="/explore /trending /trending/developers /integrations /integrations/feature/code /integrations/feature/collaborate /integrations/feature/ship showcases showcases_search showcases_landing /explore">
                  Explore
</a>              </li>

              <li class="ml-4">
                    <a href="/marketplace" class="js-selected-navigation-item HeaderNavlink px-0 py-2 m-0" data-ga-click="Header, click, Nav menu - item:marketplace" data-selected-links=" /marketplace">
                      Marketplace
</a>              </li>
              <li class="ml-4">
                <a href="/pricing" class="js-selected-navigation-item HeaderNavlink px-0 py-2 m-0" data-ga-click="Header, click, Nav menu - item:pricing" data-selected-links="/pricing /pricing/developer /pricing/team /pricing/business-hosted /pricing/business-enterprise /pricing">
                  Pricing
</a>              </li>
          </ul>
        </nav>

      <div class="d-flex">
          <div class="d-lg-flex flex-items-center mr-3">
            <div class="header-search scoped-search site-scoped-search js-site-search" role="search">
  <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/abuzer/ci-chat/search" class="js-site-search-form" data-scoped-search-url="/abuzer/ci-chat/search" data-unscoped-search-url="/search" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <label class="form-control header-search-wrapper js-chromeless-input-container">
        <a href="/abuzer/ci-chat/blob/master/js/chat/jquery.js" class="header-search-scope no-underline">This repository</a>
      <input type="text"
        class="form-control header-search-input js-site-search-focus js-site-search-field is-clearable"
        data-hotkey="s"
        name="q"
        value=""
        placeholder="Search"
        aria-label="Search this repository"
        data-unscoped-placeholder="Search GitHub"
        data-scoped-placeholder="Search"
        autocapitalize="off">
        <input type="hidden" class="js-site-search-type-field" name="type" >
    </label>
</form></div>

          </div>

        <span class="d-inline-block">
            <div class="HeaderNavlink px-0 py-2 m-0">
              <a class="text-bold text-white no-underline" href="/login?return_to=%2Fabuzer%2Fci-chat%2Fblob%2Fmaster%2Fjs%2Fchat%2Fjquery.js" data-ga-click="(Logged out) Header, clicked Sign in, text:sign-in">Sign in</a>
                <span class="text-gray">or</span>
                <a class="text-bold text-white no-underline" href="/join?source=header-repo" data-ga-click="(Logged out) Header, clicked Sign up, text:sign-up">Sign up</a>
            </div>
        </span>
      </div>
    </div>
  </div>
</header>

  </div>

  <div id="start-of-content" class="show-on-focus"></div>

    <div id="js-flash-container">
</div>



  <div role="main" class="application-main ">
        <div itemscope itemtype="http://schema.org/SoftwareSourceCode" class="">
    <div id="js-repo-pjax-container" data-pjax-container >
      







  <div class="pagehead repohead instapaper_ignore readability-menu experiment-repo-nav  ">
    <div class="repohead-details-container clearfix container">

      <ul class="pagehead-actions">
  <li>
      <a href="/login?return_to=%2Fabuzer%2Fci-chat"
    class="btn btn-sm btn-with-count tooltipped tooltipped-n"
    aria-label="You must be signed in to watch a repository" rel="nofollow">
    <svg aria-hidden="true" class="octicon octicon-eye" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"/></svg>
    Watch
  </a>
  <a class="social-count" href="/abuzer/ci-chat/watchers"
     aria-label="10 users are watching this repository">
    10
  </a>

  </li>

  <li>
      <a href="/login?return_to=%2Fabuzer%2Fci-chat"
    class="btn btn-sm btn-with-count tooltipped tooltipped-n"
    aria-label="You must be signed in to star a repository" rel="nofollow">
    <svg aria-hidden="true" class="octicon octicon-star" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path fill-rule="evenodd" d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74z"/></svg>
    Star
  </a>

    <a class="social-count js-social-count" href="/abuzer/ci-chat/stargazers"
      aria-label="24 users starred this repository">
      24
    </a>

  </li>

  <li>
      <a href="/login?return_to=%2Fabuzer%2Fci-chat"
        class="btn btn-sm btn-with-count tooltipped tooltipped-n"
        aria-label="You must be signed in to fork a repository" rel="nofollow">
        <svg aria-hidden="true" class="octicon octicon-repo-forked" height="16" version="1.1" viewBox="0 0 10 16" width="10"><path fill-rule="evenodd" d="M8 1a1.993 1.993 0 0 0-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 0 0 2 1a1.993 1.993 0 0 0-1 3.72V6.5l3 3v1.78A1.993 1.993 0 0 0 5 15a1.993 1.993 0 0 0 1-3.72V9.5l3-3V4.72A1.993 1.993 0 0 0 8 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"/></svg>
        Fork
      </a>

    <a href="/abuzer/ci-chat/network" class="social-count"
       aria-label="50 users forked this repository">
      50
    </a>
  </li>
</ul>

      <h1 class="public ">
  <svg aria-hidden="true" class="octicon octicon-repo" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"/></svg>
  <span class="author" itemprop="author"><a href="/abuzer" class="url fn" rel="author">abuzer</a></span><!--
--><span class="path-divider">/</span><!--
--><strong itemprop="name"><a href="/abuzer/ci-chat" data-pjax="#js-repo-pjax-container">ci-chat</a></strong>

</h1>

    </div>
    
<nav class="reponav js-repo-nav js-sidenav-container-pjax container"
     itemscope
     itemtype="http://schema.org/BreadcrumbList"
     role="navigation"
     data-pjax="#js-repo-pjax-container">

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/abuzer/ci-chat" class="js-selected-navigation-item selected reponav-item" data-hotkey="g c" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches repo_packages /abuzer/ci-chat" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-code" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path fill-rule="evenodd" d="M9.5 3L8 4.5 11.5 8 8 11.5 9.5 13 14 8 9.5 3zm-5 0L0 8l4.5 5L6 11.5 2.5 8 6 4.5 4.5 3z"/></svg>
      <span itemprop="name">Code</span>
      <meta itemprop="position" content="1">
</a>  </span>

    <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
      <a href="/abuzer/ci-chat/issues" class="js-selected-navigation-item reponav-item" data-hotkey="g i" data-selected-links="repo_issues repo_labels repo_milestones /abuzer/ci-chat/issues" itemprop="url">
        <svg aria-hidden="true" class="octicon octicon-issue-opened" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"/></svg>
        <span itemprop="name">Issues</span>
        <span class="Counter">2</span>
        <meta itemprop="position" content="2">
</a>    </span>

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/abuzer/ci-chat/pulls" class="js-selected-navigation-item reponav-item" data-hotkey="g p" data-selected-links="repo_pulls checks /abuzer/ci-chat/pulls" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-git-pull-request" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M11 11.28V5c-.03-.78-.34-1.47-.94-2.06C9.46 2.35 8.78 2.03 8 2H7V0L4 3l3 3V4h1c.27.02.48.11.69.31.21.2.3.42.31.69v6.28A1.993 1.993 0 0 0 10 15a1.993 1.993 0 0 0 1-3.72zm-1 2.92c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zM4 3c0-1.11-.89-2-2-2a1.993 1.993 0 0 0-1 3.72v6.56A1.993 1.993 0 0 0 2 15a1.993 1.993 0 0 0 1-3.72V4.72c.59-.34 1-.98 1-1.72zm-.8 10c0 .66-.55 1.2-1.2 1.2-.65 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"/></svg>
      <span itemprop="name">Pull requests</span>
      <span class="Counter">0</span>
      <meta itemprop="position" content="3">
</a>  </span>

    <a href="/abuzer/ci-chat/projects" class="js-selected-navigation-item reponav-item" data-hotkey="g b" data-selected-links="repo_projects new_repo_project repo_project /abuzer/ci-chat/projects">
      <svg aria-hidden="true" class="octicon octicon-project" height="16" version="1.1" viewBox="0 0 15 16" width="15"><path fill-rule="evenodd" d="M10 12h3V2h-3v10zm-4-2h3V2H6v8zm-4 4h3V2H2v12zm-1 1h13V1H1v14zM14 0H1a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z"/></svg>
      Projects
      <span class="Counter" >0</span>
</a>


  <a href="/abuzer/ci-chat/pulse" class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors dependency_graph pulse /abuzer/ci-chat/pulse">
    <svg aria-hidden="true" class="octicon octicon-graph" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M16 14v1H0V0h1v14h15zM5 13H3V8h2v5zm4 0H7V3h2v10zm4 0h-2V6h2v7z"/></svg>
    Insights
</a>

</nav>


  </div>

<div class="container new-discussion-timeline experiment-repo-nav  ">
  <div class="repository-content ">

    
  <a href="/abuzer/ci-chat/blob/1f05b3374c9da6407e6dfbb00351386a0b50d6b2/js/chat/jquery.js" class="d-none js-permalink-shortcut" data-hotkey="y">Permalink</a>

  <!-- blob contrib key: blob_contributors:v21:503d6f3a3cfc7e4ab3237f77a0ba061a -->

  <div class="file-navigation">
    
<div class="select-menu branch-select-menu js-menu-container js-select-menu float-left">
  <button class=" btn btn-sm select-menu-button js-menu-target css-truncate" data-hotkey="w"
    
    type="button" aria-label="Switch branches or tags" aria-expanded="false" aria-haspopup="true">
      <i>Branch:</i>
      <span class="js-select-button css-truncate-target">master</span>
  </button>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax>

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <svg aria-label="Close" class="octicon octicon-x js-menu-close" height="16" role="img" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
        <span class="select-menu-title">Switch branches/tags</span>
      </div>

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="form-control js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" data-filter-placeholder="Filter branches/tags" class="js-select-menu-tab" role="tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" data-filter-placeholder="Find a tag…" class="js-select-menu-tab" role="tab">Tags</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches" role="menu">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open selected"
               href="/abuzer/ci-chat/blob/master/js/chat/jquery.js"
               data-name="master"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text">
                master
              </span>
            </a>
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div>

    </div>
  </div>
</div>

    <div class="BtnGroup float-right">
      <a href="/abuzer/ci-chat/find/master"
            class="js-pjax-capture-input btn btn-sm BtnGroup-item"
            data-pjax
            data-hotkey="t">
        Find file
      </a>
      <clipboard-copy
            for="blob-path"
            role="button"
            aria-label="Copy file path to clipboard"
            class="btn btn-sm BtnGroup-item tooltipped tooltipped-s"
            data-copied-hint="Copied!">
        Copy path
      </clipboard-copy>
    </div>
    <div id="blob-path" class="breadcrumb">
      <span class="repo-root js-repo-root"><span class="js-path-segment"><a href="/abuzer/ci-chat" data-pjax="true"><span>ci-chat</span></a></span></span><span class="separator">/</span><span class="js-path-segment"><a href="/abuzer/ci-chat/tree/master/js" data-pjax="true"><span>js</span></a></span><span class="separator">/</span><span class="js-path-segment"><a href="/abuzer/ci-chat/tree/master/js/chat" data-pjax="true"><span>chat</span></a></span><span class="separator">/</span><strong class="final-path">jquery.js</strong>
    </div>
  </div>


  <include-fragment class="commit-tease" src="/abuzer/ci-chat/contributors/master/js/chat/jquery.js">
    <div>
      Fetching contributors&hellip;
    </div>

    <div class="commit-tease-contributors">
      <img alt="" class="loader-loading float-left" height="16" src="https://assets-cdn.github.com/images/spinners/octocat-spinner-32-EAF2F5.gif" width="16" />
      <span class="loader-error">Cannot retrieve contributors at this time</span>
    </div>
</include-fragment>

  <div class="file">
    <div class="file-header">
  <div class="file-actions">

    <div class="BtnGroup">
      <a href="/abuzer/ci-chat/raw/master/js/chat/jquery.js" class="btn btn-sm BtnGroup-item" id="raw-url">Raw</a>
        <a href="/abuzer/ci-chat/blame/master/js/chat/jquery.js" class="btn btn-sm js-update-url-with-hash BtnGroup-item" data-hotkey="b">Blame</a>
      <a href="/abuzer/ci-chat/commits/master/js/chat/jquery.js" class="btn btn-sm BtnGroup-item" rel="nofollow">History</a>
    </div>

        <a class="btn-octicon tooltipped tooltipped-nw"
           href="https://desktop.github.com"
           aria-label="Open this file in GitHub Desktop"
           data-ga-click="Repository, open with desktop, type:windows">
            <svg aria-hidden="true" class="octicon octicon-device-desktop" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M15 2H1c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h5.34c-.25.61-.86 1.39-2.34 2h8c-1.48-.61-2.09-1.39-2.34-2H15c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm0 9H1V3h14v8z"/></svg>
        </a>

        <button type="button" class="btn-octicon disabled tooltipped tooltipped-nw"
          aria-label="You must be signed in to make or propose changes">
          <svg aria-hidden="true" class="octicon octicon-pencil" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"/></svg>
        </button>
        <button type="button" class="btn-octicon btn-octicon-danger disabled tooltipped tooltipped-nw"
          aria-label="You must be signed in to make or propose changes">
          <svg aria-hidden="true" class="octicon octicon-trashcan" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"/></svg>
        </button>
  </div>

  <div class="file-info">
      19 lines (19 sloc)
      <span class="file-info-divider"></span>
    55.9 KB
  </div>
</div>

    

  <div itemprop="text" class="blob-wrapper data type-javascript">
      <table class="highlight tab-size js-file-line-container" data-tab-size="8">
      <tr>
        <td id="L1" class="blob-num js-line-number" data-line-number="1"></td>
        <td id="LC1" class="blob-code blob-code-inner js-file-line"><span class="pl-c"><span class="pl-c">/*</span></span></td>
      </tr>
      <tr>
        <td id="L2" class="blob-num js-line-number" data-line-number="2"></td>
        <td id="LC2" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * jQuery JavaScript Library v1.3.2</span></td>
      </tr>
      <tr>
        <td id="L3" class="blob-num js-line-number" data-line-number="3"></td>
        <td id="LC3" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * http://jquery.com/</span></td>
      </tr>
      <tr>
        <td id="L4" class="blob-num js-line-number" data-line-number="4"></td>
        <td id="LC4" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> *</span></td>
      </tr>
      <tr>
        <td id="L5" class="blob-num js-line-number" data-line-number="5"></td>
        <td id="LC5" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * Copyright (c) 2009 John Resig</span></td>
      </tr>
      <tr>
        <td id="L6" class="blob-num js-line-number" data-line-number="6"></td>
        <td id="LC6" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * Dual licensed under the MIT and GPL licenses.</span></td>
      </tr>
      <tr>
        <td id="L7" class="blob-num js-line-number" data-line-number="7"></td>
        <td id="LC7" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * http://docs.jquery.com/License</span></td>
      </tr>
      <tr>
        <td id="L8" class="blob-num js-line-number" data-line-number="8"></td>
        <td id="LC8" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> *</span></td>
      </tr>
      <tr>
        <td id="L9" class="blob-num js-line-number" data-line-number="9"></td>
        <td id="LC9" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * Date: 2009-02-19 17:34:21 -0500 (Thu, 19 Feb 2009)</span></td>
      </tr>
      <tr>
        <td id="L10" class="blob-num js-line-number" data-line-number="10"></td>
        <td id="LC10" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * Revision: 6246</span></td>
      </tr>
      <tr>
        <td id="L11" class="blob-num js-line-number" data-line-number="11"></td>
        <td id="LC11" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> <span class="pl-c">*/</span></span></td>
      </tr>
      <tr>
        <td id="L12" class="blob-num js-line-number" data-line-number="12"></td>
        <td id="LC12" class="blob-code blob-code-inner js-file-line">(function(){var l=this,g,y=l.jQuery,p=l.$,o=l.jQuery=l.$=function(E,F){return new o.fn.init(E,F)},D=/^[^&lt;]*(&lt;(.|\s)+&gt;)[^&gt;]*$|^#([\w-]+)$/,f=/^.[^:#\[\.,]*$/;o.fn=o.prototype={init:function(E,H){E=E||document;if(E.nodeType){this[0]=E;this.length=1;this.context=E;return this}if(typeof E===&quot;string&quot;){var G=D.exec(E);if(G&amp;&amp;(G[1]||!H)){if(G[1]){E=o.clean([G[1]],H)}else{var I=document.getElementById(G[3]);if(I&amp;&amp;I.id!=G[3]){return o().find(E)}var F=o(I||[]);F.context=document;F.selector=E;return F}}else{return o(H).find(E)}}else{if(o.isFunction(E)){return o(document).ready(E)}}if(E.selector&amp;&amp;E.context){this.selector=E.selector;this.context=E.context}return this.setArray(o.isArray(E)?E:o.makeArray(E))},selector:&quot;&quot;,jquery:&quot;1.3.2&quot;,size:function(){return this.length},get:function(E){return E===g?Array.prototype.slice.call(this):this[E]},pushStack:function(F,H,E){var G=o(F);G.prevObject=this;G.context=this.context;if(H===&quot;find&quot;){G.selector=this.selector+(this.selector?&quot; &quot;:&quot;&quot;)+E}else{if(H){G.selector=this.selector+&quot;.&quot;+H+&quot;(&quot;+E+&quot;)&quot;}}return G},setArray:function(E){this.length=0;Array.prototype.push.apply(this,E);return this},each:function(F,E){return o.each(this,F,E)},index:function(E){return o.inArray(E&amp;&amp;E.jquery?E[0]:E,this)},attr:function(F,H,G){var E=F;if(typeof F===&quot;string&quot;){if(H===g){return this[0]&amp;&amp;o[G||&quot;attr&quot;](this[0],F)}else{E={};E[F]=H}}return this.each(function(I){for(F in E){o.attr(G?this.style:this,F,o.prop(this,E[F],G,I,F))}})},css:function(E,F){if((E==&quot;width&quot;||E==&quot;height&quot;)&amp;&amp;parseFloat(F)&lt;0){F=g}return this.attr(E,F,&quot;curCSS&quot;)},text:function(F){if(typeof F!==&quot;object&quot;&amp;&amp;F!=null){return this.empty().append((this[0]&amp;&amp;this[0].ownerDocument||document).createTextNode(F))}var E=&quot;&quot;;o.each(F||this,function(){o.each(this.childNodes,function(){if(this.nodeType!=8){E+=this.nodeType!=1?this.nodeValue:o.fn.text([this])}})});return E},wrapAll:function(E){if(this[0]){var F=o(E,this[0].ownerDocument).clone();if(this[0].parentNode){F.insertBefore(this[0])}F.map(function(){var G=this;while(G.firstChild){G=G.firstChild}return G}).append(this)}return this},wrapInner:function(E){return this.each(function(){o(this).contents().wrapAll(E)})},wrap:function(E){return this.each(function(){o(this).wrapAll(E)})},append:function(){return this.domManip(arguments,true,function(E){if(this.nodeType==1){this.appendChild(E)}})},prepend:function(){return this.domManip(arguments,true,function(E){if(this.nodeType==1){this.insertBefore(E,this.firstChild)}})},before:function(){return this.domManip(arguments,false,function(E){this.parentNode.insertBefore(E,this)})},after:function(){return this.domManip(arguments,false,function(E){this.parentNode.insertBefore(E,this.nextSibling)})},end:function(){return this.prevObject||o([])},push:[].push,sort:[].sort,splice:[].splice,find:function(E){if(this.length===1){var F=this.pushStack([],&quot;find&quot;,E);F.length=0;o.find(E,this[0],F);return F}else{return this.pushStack(o.unique(o.map(this,function(G){return o.find(E,G)})),&quot;find&quot;,E)}},clone:function(G){var E=this.map(function(){if(!o.support.noCloneEvent&amp;&amp;!o.isXMLDoc(this)){var I=this.outerHTML;if(!I){var J=this.ownerDocument.createElement(&quot;div&quot;);J.appendChild(this.cloneNode(true));I=J.innerHTML}return o.clean([I.replace(/ jQuery\d+=&quot;(?:\d+|null)&quot;/g,&quot;&quot;).replace(/^\s*/,&quot;&quot;)])[0]}else{return this.cloneNode(true)}});if(G===true){var H=this.find(&quot;*&quot;).andSelf(),F=0;E.find(&quot;*&quot;).andSelf().each(function(){if(this.nodeName!==H[F].nodeName){return}var I=o.data(H[F],&quot;events&quot;);for(var K in I){for(var J in I[K]){o.event.add(this,K,I[K][J],I[K][J].data)}}F++})}return E},filter:function(E){return this.pushStack(o.isFunction(E)&amp;&amp;o.grep(this,function(G,F){return E.call(G,F)})||o.multiFilter(E,o.grep(this,function(F){return F.nodeType===1})),&quot;filter&quot;,E)},closest:function(E){var G=o.expr.match.POS.test(E)?o(E):null,F=0;return this.map(function(){var H=this;while(H&amp;&amp;H.ownerDocument){if(G?G.index(H)&gt;-1:o(H).is(E)){o.data(H,&quot;closest&quot;,F);return H}H=H.parentNode;F++}})},not:function(E){if(typeof E===&quot;string&quot;){if(f.test(E)){return this.pushStack(o.multiFilter(E,this,true),&quot;not&quot;,E)}else{E=o.multiFilter(E,this)}}var F=E.length&amp;&amp;E[E.length-1]!==g&amp;&amp;!E.nodeType;return this.filter(function(){return F?o.inArray(this,E)&lt;0:this!=E})},add:function(E){return this.pushStack(o.unique(o.merge(this.get(),typeof E===&quot;string&quot;?o(E):o.makeArray(E))))},is:function(E){return !!E&amp;&amp;o.multiFilter(E,this).length&gt;0},hasClass:function(E){return !!E&amp;&amp;this.is(&quot;.&quot;+E)},val:function(K){if(K===g){var E=this[0];if(E){if(o.nodeName(E,&quot;option&quot;)){return(E.attributes.value||{}).specified?E.value:E.text}if(o.nodeName(E,&quot;select&quot;)){var I=E.selectedIndex,L=[],M=E.options,H=E.type==&quot;select-one&quot;;if(I&lt;0){return null}for(var F=H?I:0,J=H?I+1:M.length;F&lt;J;F++){var G=M[F];if(G.selected){K=o(G).val();if(H){return K}L.push(K)}}return L}return(E.value||&quot;&quot;).replace(/\r/g,&quot;&quot;)}return g}if(typeof K===&quot;number&quot;){K+=&quot;&quot;}return this.each(function(){if(this.nodeType!=1){return}if(o.isArray(K)&amp;&amp;/radio|checkbox/.test(this.type)){this.checked=(o.inArray(this.value,K)&gt;=0||o.inArray(this.name,K)&gt;=0)}else{if(o.nodeName(this,&quot;select&quot;)){var N=o.makeArray(K);o(&quot;option&quot;,this).each(function(){this.selected=(o.inArray(this.value,N)&gt;=0||o.inArray(this.text,N)&gt;=0)});if(!N.length){this.selectedIndex=-1}}else{this.value=K}}})},html:function(E){return E===g?(this[0]?this[0].innerHTML.replace(/ jQuery\d+=&quot;(?:\d+|null)&quot;/g,&quot;&quot;):null):this.empty().append(E)},replaceWith:function(E){return this.after(E).remove()},eq:function(E){return this.slice(E,+E+1)},slice:function(){return this.pushStack(Array.prototype.slice.apply(this,arguments),&quot;slice&quot;,Array.prototype.slice.call(arguments).join(&quot;,&quot;))},map:function(E){return this.pushStack(o.map(this,function(G,F){return E.call(G,F,G)}))},andSelf:function(){return this.add(this.prevObject)},domManip:function(J,M,L){if(this[0]){var I=(this[0].ownerDocument||this[0]).createDocumentFragment(),F=o.clean(J,(this[0].ownerDocument||this[0]),I),H=I.firstChild;if(H){for(var G=0,E=this.length;G&lt;E;G++){L.call(K(this[G],H),this.length&gt;1||G&gt;0?I.cloneNode(true):I)}}if(F){o.each(F,z)}}return this;function K(N,O){return M&amp;&amp;o.nodeName(N,&quot;table&quot;)&amp;&amp;o.nodeName(O,&quot;tr&quot;)?(N.getElementsByTagName(&quot;tbody&quot;)[0]||N.appendChild(N.ownerDocument.createElement(&quot;tbody&quot;))):N}}};o.fn.init.prototype=o.fn;function z(E,F){if(F.src){o.ajax({url:F.src,async:false,dataType:&quot;script&quot;})}else{o.globalEval(F.text||F.textContent||F.innerHTML||&quot;&quot;)}if(F.parentNode){F.parentNode.removeChild(F)}}function e(){return +new Date}o.extend=o.fn.extend=function(){var J=arguments[0]||{},H=1,I=arguments.length,E=false,G;if(typeof J===&quot;boolean&quot;){E=J;J=arguments[1]||{};H=2}if(typeof J!==&quot;object&quot;&amp;&amp;!o.isFunction(J)){J={}}if(I==H){J=this;--H}for(;H&lt;I;H++){if((G=arguments[H])!=null){for(var F in G){var K=J[F],L=G[F];if(J===L){continue}if(E&amp;&amp;L&amp;&amp;typeof L===&quot;object&quot;&amp;&amp;!L.nodeType){J[F]=o.extend(E,K||(L.length!=null?[]:{}),L)}else{if(L!==g){J[F]=L}}}}}return J};var b=/z-?index|font-?weight|opacity|zoom|line-?height/i,q=document.defaultView||{},s=Object.prototype.toString;o.extend({noConflict:function(E){l.$=p;if(E){l.jQuery=y}return o},isFunction:function(E){return s.call(E)===&quot;[object Function]&quot;},isArray:function(E){return s.call(E)===&quot;[object Array]&quot;},isXMLDoc:function(E){return E.nodeType===9&amp;&amp;E.documentElement.nodeName!==&quot;HTML&quot;||!!E.ownerDocument&amp;&amp;o.isXMLDoc(E.ownerDocument)},globalEval:function(G){if(G&amp;&amp;/\S/.test(G)){var F=document.getElementsByTagName(&quot;head&quot;)[0]||document.documentElement,E=document.createElement(&quot;script&quot;);E.type=&quot;text/javascript&quot;;if(o.support.scriptEval){E.appendChild(document.createTextNode(G))}else{E.text=G}F.insertBefore(E,F.firstChild);F.removeChild(E)}},nodeName:function(F,E){return F.nodeName&amp;&amp;F.nodeName.toUpperCase()==E.toUpperCase()},each:function(G,K,F){var E,H=0,I=G.length;if(F){if(I===g){for(E in G){if(K.apply(G[E],F)===false){break}}}else{for(;H&lt;I;){if(K.apply(G[H++],F)===false){break}}}}else{if(I===g){for(E in G){if(K.call(G[E],E,G[E])===false){break}}}else{for(var J=G[0];H&lt;I&amp;&amp;K.call(J,H,J)!==false;J=G[++H]){}}}return G},prop:function(H,I,G,F,E){if(o.isFunction(I)){I=I.call(H,F)}return typeof I===&quot;number&quot;&amp;&amp;G==&quot;curCSS&quot;&amp;&amp;!b.test(E)?I+&quot;px&quot;:I},className:{add:function(E,F){o.each((F||&quot;&quot;).split(/\s+/),function(G,H){if(E.nodeType==1&amp;&amp;!o.className.has(E.className,H)){E.className+=(E.className?&quot; &quot;:&quot;&quot;)+H}})},remove:function(E,F){if(E.nodeType==1){E.className=F!==g?o.grep(E.className.split(/\s+/),function(G){return !o.className.has(F,G)}).join(&quot; &quot;):&quot;&quot;}},has:function(F,E){return F&amp;&amp;o.inArray(E,(F.className||F).toString().split(/\s+/))&gt;-1}},swap:function(H,G,I){var E={};for(var F in G){E[F]=H.style[F];H.style[F]=G[F]}I.call(H);for(var F in G){H.style[F]=E[F]}},css:function(H,F,J,E){if(F==&quot;width&quot;||F==&quot;height&quot;){var L,G={position:&quot;absolute&quot;,visibility:&quot;hidden&quot;,display:&quot;block&quot;},K=F==&quot;width&quot;?[&quot;Left&quot;,&quot;Right&quot;]:[&quot;Top&quot;,&quot;Bottom&quot;];function I(){L=F==&quot;width&quot;?H.offsetWidth:H.offsetHeight;if(E===&quot;border&quot;){return}o.each(K,function(){if(!E){L-=parseFloat(o.curCSS(H,&quot;padding&quot;+this,true))||0}if(E===&quot;margin&quot;){L+=parseFloat(o.curCSS(H,&quot;margin&quot;+this,true))||0}else{L-=parseFloat(o.curCSS(H,&quot;border&quot;+this+&quot;Width&quot;,true))||0}})}if(H.offsetWidth!==0){I()}else{o.swap(H,G,I)}return Math.max(0,Math.round(L))}return o.curCSS(H,F,J)},curCSS:function(I,F,G){var L,E=I.style;if(F==&quot;opacity&quot;&amp;&amp;!o.support.opacity){L=o.attr(E,&quot;opacity&quot;);return L==&quot;&quot;?&quot;1&quot;:L}if(F.match(/float/i)){F=w}if(!G&amp;&amp;E&amp;&amp;E[F]){L=E[F]}else{if(q.getComputedStyle){if(F.match(/float/i)){F=&quot;float&quot;}F=F.replace(/([A-Z])/g,&quot;-$1&quot;).toLowerCase();var M=q.getComputedStyle(I,null);if(M){L=M.getPropertyValue(F)}if(F==&quot;opacity&quot;&amp;&amp;L==&quot;&quot;){L=&quot;1&quot;}}else{if(I.currentStyle){var J=F.replace(/\-(\w)/g,function(N,O){return O.toUpperCase()});L=I.currentStyle[F]||I.currentStyle[J];if(!/^\d+(px)?$/i.test(L)&amp;&amp;/^\d/.test(L)){var H=E.left,K=I.runtimeStyle.left;I.runtimeStyle.left=I.currentStyle.left;E.left=L||0;L=E.pixelLeft+&quot;px&quot;;E.left=H;I.runtimeStyle.left=K}}}}return L},clean:function(F,K,I){K=K||document;if(typeof K.createElement===&quot;undefined&quot;){K=K.ownerDocument||K[0]&amp;&amp;K[0].ownerDocument||document}if(!I&amp;&amp;F.length===1&amp;&amp;typeof F[0]===&quot;string&quot;){var H=/^&lt;(\w+)\s*\/?&gt;$/.exec(F[0]);if(H){return[K.createElement(H[1])]}}var G=[],E=[],L=K.createElement(&quot;div&quot;);o.each(F,function(P,S){if(typeof S===&quot;number&quot;){S+=&quot;&quot;}if(!S){return}if(typeof S===&quot;string&quot;){S=S.replace(/(&lt;(\w+)[^&gt;]*?)\/&gt;/g,function(U,V,T){return T.match(/^(abbr|br|col|img|input|link|meta|param|hr|area|embed)$/i)?U:V+&quot;&gt;&lt;/&quot;+T+&quot;&gt;&quot;});var O=S.replace(/^\s+/,&quot;&quot;).substring(0,10).toLowerCase();var Q=!O.indexOf(&quot;&lt;opt&quot;)&amp;&amp;[1,&quot;&lt;select multiple=&#39;multiple&#39;&gt;&quot;,&quot;&lt;/select&gt;&quot;]||!O.indexOf(&quot;&lt;leg&quot;)&amp;&amp;[1,&quot;&lt;fieldset&gt;&quot;,&quot;&lt;/fieldset&gt;&quot;]||O.match(/^&lt;(thead|tbody|tfoot|colg|cap)/)&amp;&amp;[1,&quot;&lt;table&gt;&quot;,&quot;&lt;/table&gt;&quot;]||!O.indexOf(&quot;&lt;tr&quot;)&amp;&amp;[2,&quot;&lt;table&gt;&lt;tbody&gt;&quot;,&quot;&lt;/tbody&gt;&lt;/table&gt;&quot;]||(!O.indexOf(&quot;&lt;td&quot;)||!O.indexOf(&quot;&lt;th&quot;))&amp;&amp;[3,&quot;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&quot;,&quot;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&quot;]||!O.indexOf(&quot;&lt;col&quot;)&amp;&amp;[2,&quot;&lt;table&gt;&lt;tbody&gt;&lt;/tbody&gt;&lt;colgroup&gt;&quot;,&quot;&lt;/colgroup&gt;&lt;/table&gt;&quot;]||!o.support.htmlSerialize&amp;&amp;[1,&quot;div&lt;div&gt;&quot;,&quot;&lt;/div&gt;&quot;]||[0,&quot;&quot;,&quot;&quot;];L.innerHTML=Q[1]+S+Q[2];while(Q[0]--){L=L.lastChild}if(!o.support.tbody){var R=/&lt;tbody/i.test(S),N=!O.indexOf(&quot;&lt;table&quot;)&amp;&amp;!R?L.firstChild&amp;&amp;L.firstChild.childNodes:Q[1]==&quot;&lt;table&gt;&quot;&amp;&amp;!R?L.childNodes:[];for(var M=N.length-1;M&gt;=0;--M){if(o.nodeName(N[M],&quot;tbody&quot;)&amp;&amp;!N[M].childNodes.length){N[M].parentNode.removeChild(N[M])}}}if(!o.support.leadingWhitespace&amp;&amp;/^\s/.test(S)){L.insertBefore(K.createTextNode(S.match(/^\s*/)[0]),L.firstChild)}S=o.makeArray(L.childNodes)}if(S.nodeType){G.push(S)}else{G=o.merge(G,S)}});if(I){for(var J=0;G[J];J++){if(o.nodeName(G[J],&quot;script&quot;)&amp;&amp;(!G[J].type||G[J].type.toLowerCase()===&quot;text/javascript&quot;)){E.push(G[J].parentNode?G[J].parentNode.removeChild(G[J]):G[J])}else{if(G[J].nodeType===1){G.splice.apply(G,[J+1,0].concat(o.makeArray(G[J].getElementsByTagName(&quot;script&quot;))))}I.appendChild(G[J])}}return E}return G},attr:function(J,G,K){if(!J||J.nodeType==3||J.nodeType==8){return g}var H=!o.isXMLDoc(J),L=K!==g;G=H&amp;&amp;o.props[G]||G;if(J.tagName){var F=/href|src|style/.test(G);if(G==&quot;selected&quot;&amp;&amp;J.parentNode){J.parentNode.selectedIndex}if(G in J&amp;&amp;H&amp;&amp;!F){if(L){if(G==&quot;type&quot;&amp;&amp;o.nodeName(J,&quot;input&quot;)&amp;&amp;J.parentNode){throw&quot;type property can&#39;t be changed&quot;}J[G]=K}if(o.nodeName(J,&quot;form&quot;)&amp;&amp;J.getAttributeNode(G)){return J.getAttributeNode(G).nodeValue}if(G==&quot;tabIndex&quot;){var I=J.getAttributeNode(&quot;tabIndex&quot;);return I&amp;&amp;I.specified?I.value:J.nodeName.match(/(button|input|object|select|textarea)/i)?0:J.nodeName.match(/^(a|area)$/i)&amp;&amp;J.href?0:g}return J[G]}if(!o.support.style&amp;&amp;H&amp;&amp;G==&quot;style&quot;){return o.attr(J.style,&quot;cssText&quot;,K)}if(L){J.setAttribute(G,&quot;&quot;+K)}var E=!o.support.hrefNormalized&amp;&amp;H&amp;&amp;F?J.getAttribute(G,2):J.getAttribute(G);return E===null?g:E}if(!o.support.opacity&amp;&amp;G==&quot;opacity&quot;){if(L){J.zoom=1;J.filter=(J.filter||&quot;&quot;).replace(/alpha\([^)]*\)/,&quot;&quot;)+(parseInt(K)+&quot;&quot;==&quot;NaN&quot;?&quot;&quot;:&quot;alpha(opacity=&quot;+K*100+&quot;)&quot;)}return J.filter&amp;&amp;J.filter.indexOf(&quot;opacity=&quot;)&gt;=0?(parseFloat(J.filter.match(/opacity=([^)]*)/)[1])/100)+&quot;&quot;:&quot;&quot;}G=G.replace(/-([a-z])/ig,function(M,N){return N.toUpperCase()});if(L){J[G]=K}return J[G]},trim:function(E){return(E||&quot;&quot;).replace(/^\s+|\s+$/g,&quot;&quot;)},makeArray:function(G){var E=[];if(G!=null){var F=G.length;if(F==null||typeof G===&quot;string&quot;||o.isFunction(G)||G.setInterval){E[0]=G}else{while(F){E[--F]=G[F]}}}return E},inArray:function(G,H){for(var E=0,F=H.length;E&lt;F;E++){if(H[E]===G){return E}}return -1},merge:function(H,E){var F=0,G,I=H.length;if(!o.support.getAll){while((G=E[F++])!=null){if(G.nodeType!=8){H[I++]=G}}}else{while((G=E[F++])!=null){H[I++]=G}}return H},unique:function(K){var F=[],E={};try{for(var G=0,H=K.length;G&lt;H;G++){var J=o.data(K[G]);if(!E[J]){E[J]=true;F.push(K[G])}}}catch(I){F=K}return F},grep:function(F,J,E){var G=[];for(var H=0,I=F.length;H&lt;I;H++){if(!E!=!J(F[H],H)){G.push(F[H])}}return G},map:function(E,J){var F=[];for(var G=0,H=E.length;G&lt;H;G++){var I=J(E[G],G);if(I!=null){F[F.length]=I}}return F.concat.apply([],F)}});var C=navigator.userAgent.toLowerCase();o.browser={version:(C.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[0,&quot;0&quot;])[1],safari:/webkit/.test(C),opera:/opera/.test(C),msie:/msie/.test(C)&amp;&amp;!/opera/.test(C),mozilla:/mozilla/.test(C)&amp;&amp;!/(compatible|webkit)/.test(C)};o.each({parent:function(E){return E.parentNode},parents:function(E){return o.dir(E,&quot;parentNode&quot;)},next:function(E){return o.nth(E,2,&quot;nextSibling&quot;)},prev:function(E){return o.nth(E,2,&quot;previousSibling&quot;)},nextAll:function(E){return o.dir(E,&quot;nextSibling&quot;)},prevAll:function(E){return o.dir(E,&quot;previousSibling&quot;)},siblings:function(E){return o.sibling(E.parentNode.firstChild,E)},children:function(E){return o.sibling(E.firstChild)},contents:function(E){return o.nodeName(E,&quot;iframe&quot;)?E.contentDocument||E.contentWindow.document:o.makeArray(E.childNodes)}},function(E,F){o.fn[E]=function(G){var H=o.map(this,F);if(G&amp;&amp;typeof G==&quot;string&quot;){H=o.multiFilter(G,H)}return this.pushStack(o.unique(H),E,G)}});o.each({appendTo:&quot;append&quot;,prependTo:&quot;prepend&quot;,insertBefore:&quot;before&quot;,insertAfter:&quot;after&quot;,replaceAll:&quot;replaceWith&quot;},function(E,F){o.fn[E]=function(G){var J=[],L=o(G);for(var K=0,H=L.length;K&lt;H;K++){var I=(K&gt;0?this.clone(true):this).get();o.fn[F].apply(o(L[K]),I);J=J.concat(I)}return this.pushStack(J,E,G)}});o.each({removeAttr:function(E){o.attr(this,E,&quot;&quot;);if(this.nodeType==1){this.removeAttribute(E)}},addClass:function(E){o.className.add(this,E)},removeClass:function(E){o.className.remove(this,E)},toggleClass:function(F,E){if(typeof E!==&quot;boolean&quot;){E=!o.className.has(this,F)}o.className[E?&quot;add&quot;:&quot;remove&quot;](this,F)},remove:function(E){if(!E||o.filter(E,[this]).length){o(&quot;*&quot;,this).add([this]).each(function(){o.event.remove(this);o.removeData(this)});if(this.parentNode){this.parentNode.removeChild(this)}}},empty:function(){o(this).children().remove();while(this.firstChild){this.removeChild(this.firstChild)}}},function(E,F){o.fn[E]=function(){return this.each(F,arguments)}});function j(E,F){return E[0]&amp;&amp;parseInt(o.curCSS(E[0],F,true),10)||0}var h=&quot;jQuery&quot;+e(),v=0,A={};o.extend({cache:{},data:function(F,E,G){F=F==l?A:F;var H=F[h];if(!H){H=F[h]=++v}if(E&amp;&amp;!o.cache[H]){o.cache[H]={}}if(G!==g){o.cache[H][E]=G}return E?o.cache[H][E]:H},removeData:function(F,E){F=F==l?A:F;var H=F[h];if(E){if(o.cache[H]){delete o.cache[H][E];E=&quot;&quot;;for(E in o.cache[H]){break}if(!E){o.removeData(F)}}}else{try{delete F[h]}catch(G){if(F.removeAttribute){F.removeAttribute(h)}}delete o.cache[H]}},queue:function(F,E,H){if(F){E=(E||&quot;fx&quot;)+&quot;queue&quot;;var G=o.data(F,E);if(!G||o.isArray(H)){G=o.data(F,E,o.makeArray(H))}else{if(H){G.push(H)}}}return G},dequeue:function(H,G){var E=o.queue(H,G),F=E.shift();if(!G||G===&quot;fx&quot;){F=E[0]}if(F!==g){F.call(H)}}});o.fn.extend({data:function(E,G){var H=E.split(&quot;.&quot;);H[1]=H[1]?&quot;.&quot;+H[1]:&quot;&quot;;if(G===g){var F=this.triggerHandler(&quot;getData&quot;+H[1]+&quot;!&quot;,[H[0]]);if(F===g&amp;&amp;this.length){F=o.data(this[0],E)}return F===g&amp;&amp;H[1]?this.data(H[0]):F}else{return this.trigger(&quot;setData&quot;+H[1]+&quot;!&quot;,[H[0],G]).each(function(){o.data(this,E,G)})}},removeData:function(E){return this.each(function(){o.removeData(this,E)})},queue:function(E,F){if(typeof E!==&quot;string&quot;){F=E;E=&quot;fx&quot;}if(F===g){return o.queue(this[0],E)}return this.each(function(){var G=o.queue(this,E,F);if(E==&quot;fx&quot;&amp;&amp;G.length==1){G[0].call(this)}})},dequeue:function(E){return this.each(function(){o.dequeue(this,E)})}});</td>
      </tr>
      <tr>
        <td id="L13" class="blob-num js-line-number" data-line-number="13"></td>
        <td id="LC13" class="blob-code blob-code-inner js-file-line"><span class="pl-c"><span class="pl-c">/*</span></span></td>
      </tr>
      <tr>
        <td id="L14" class="blob-num js-line-number" data-line-number="14"></td>
        <td id="LC14" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> * Sizzle CSS Selector Engine - v0.9.3</span></td>
      </tr>
      <tr>
        <td id="L15" class="blob-num js-line-number" data-line-number="15"></td>
        <td id="LC15" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> *  Copyright 2009, The Dojo Foundation</span></td>
      </tr>
      <tr>
        <td id="L16" class="blob-num js-line-number" data-line-number="16"></td>
        <td id="LC16" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> *  Released under the MIT, BSD, and GPL Licenses.</span></td>
      </tr>
      <tr>
        <td id="L17" class="blob-num js-line-number" data-line-number="17"></td>
        <td id="LC17" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> *  More information: http://sizzlejs.com/</span></td>
      </tr>
      <tr>
        <td id="L18" class="blob-num js-line-number" data-line-number="18"></td>
        <td id="LC18" class="blob-code blob-code-inner js-file-line"><span class="pl-c"> <span class="pl-c">*/</span></span></td>
      </tr>
      <tr>
        <td id="L19" class="blob-num js-line-number" data-line-number="19"></td>
        <td id="LC19" class="blob-code blob-code-inner js-file-line">(function(){var R=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|[&#39;&quot;][^&#39;&quot;]*[&#39;&quot;]|[^[\]&#39;&quot;]+)+\]|\\.|[^ &gt;+~,(\[\\]+)+|[&gt;+~])(\s*,\s*)?/g,L=0,H=Object.prototype.toString;var F=function(Y,U,ab,ac){ab=ab||[];U=U||document;if(U.nodeType!==1&amp;&amp;U.nodeType!==9){return[]}if(!Y||typeof Y!==&quot;string&quot;){return ab}var Z=[],W,af,ai,T,ad,V,X=true;R.lastIndex=0;while((W=R.exec(Y))!==null){Z.push(W[1]);if(W[2]){V=RegExp.rightContext;break}}if(Z.length&gt;1&amp;&amp;M.exec(Y)){if(Z.length===2&amp;&amp;I.relative[Z[0]]){af=J(Z[0]+Z[1],U)}else{af=I.relative[Z[0]]?[U]:F(Z.shift(),U);while(Z.length){Y=Z.shift();if(I.relative[Y]){Y+=Z.shift()}af=J(Y,af)}}}else{var ae=ac?{expr:Z.pop(),set:E(ac)}:F.find(Z.pop(),Z.length===1&amp;&amp;U.parentNode?U.parentNode:U,Q(U));af=F.filter(ae.expr,ae.set);if(Z.length&gt;0){ai=E(af)}else{X=false}while(Z.length){var ah=Z.pop(),ag=ah;if(!I.relative[ah]){ah=&quot;&quot;}else{ag=Z.pop()}if(ag==null){ag=U}I.relative[ah](ai,ag,Q(U))}}if(!ai){ai=af}if(!ai){throw&quot;Syntax error, unrecognized expression: &quot;+(ah||Y)}if(H.call(ai)===&quot;[object Array]&quot;){if(!X){ab.push.apply(ab,ai)}else{if(U.nodeType===1){for(var aa=0;ai[aa]!=null;aa++){if(ai[aa]&amp;&amp;(ai[aa]===true||ai[aa].nodeType===1&amp;&amp;K(U,ai[aa]))){ab.push(af[aa])}}}else{for(var aa=0;ai[aa]!=null;aa++){if(ai[aa]&amp;&amp;ai[aa].nodeType===1){ab.push(af[aa])}}}}}else{E(ai,ab)}if(V){F(V,U,ab,ac);if(G){hasDuplicate=false;ab.sort(G);if(hasDuplicate){for(var aa=1;aa&lt;ab.length;aa++){if(ab[aa]===ab[aa-1]){ab.splice(aa--,1)}}}}}return ab};F.matches=function(T,U){return F(T,null,null,U)};F.find=function(aa,T,ab){var Z,X;if(!aa){return[]}for(var W=0,V=I.order.length;W&lt;V;W++){var Y=I.order[W],X;if((X=I.match[Y].exec(aa))){var U=RegExp.leftContext;if(U.substr(U.length-1)!==&quot;\\&quot;){X[1]=(X[1]||&quot;&quot;).replace(/\\/g,&quot;&quot;);Z=I.find[Y](X,T,ab);if(Z!=null){aa=aa.replace(I.match[Y],&quot;&quot;);break}}}}if(!Z){Z=T.getElementsByTagName(&quot;*&quot;)}return{set:Z,expr:aa}};F.filter=function(ad,ac,ag,W){var V=ad,ai=[],aa=ac,Y,T,Z=ac&amp;&amp;ac[0]&amp;&amp;Q(ac[0]);while(ad&amp;&amp;ac.length){for(var ab in I.filter){if((Y=I.match[ab].exec(ad))!=null){var U=I.filter[ab],ah,af;T=false;if(aa==ai){ai=[]}if(I.preFilter[ab]){Y=I.preFilter[ab](Y,aa,ag,ai,W,Z);if(!Y){T=ah=true}else{if(Y===true){continue}}}if(Y){for(var X=0;(af=aa[X])!=null;X++){if(af){ah=U(af,Y,X,aa);var ae=W^!!ah;if(ag&amp;&amp;ah!=null){if(ae){T=true}else{aa[X]=false}}else{if(ae){ai.push(af);T=true}}}}}if(ah!==g){if(!ag){aa=ai}ad=ad.replace(I.match[ab],&quot;&quot;);if(!T){return[]}break}}}if(ad==V){if(T==null){throw&quot;Syntax error, unrecognized expression: &quot;+ad}else{break}}V=ad}return aa};var I=F.selectors={order:[&quot;ID&quot;,&quot;NAME&quot;,&quot;TAG&quot;],match:{ID:/#((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,NAME:/\[name=[&#39;&quot;]*((?:[\w\u00c0-\uFFFF_-]|\\.)+)[&#39;&quot;]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF_-]|\\.)+)\s*(?:(\S?=)\s*([&#39;&quot;]*)(.*?)\3|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*_-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF_-]|\\.)+)(?:\(([&#39;&quot;]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/},attrMap:{&quot;class&quot;:&quot;className&quot;,&quot;for&quot;:&quot;htmlFor&quot;},attrHandle:{href:function(T){return T.getAttribute(&quot;href&quot;)}},relative:{&quot;+&quot;:function(aa,T,Z){var X=typeof T===&quot;string&quot;,ab=X&amp;&amp;!/\W/.test(T),Y=X&amp;&amp;!ab;if(ab&amp;&amp;!Z){T=T.toUpperCase()}for(var W=0,V=aa.length,U;W&lt;V;W++){if((U=aa[W])){while((U=U.previousSibling)&amp;&amp;U.nodeType!==1){}aa[W]=Y||U&amp;&amp;U.nodeName===T?U||false:U===T}}if(Y){F.filter(T,aa,true)}},&quot;&gt;&quot;:function(Z,U,aa){var X=typeof U===&quot;string&quot;;if(X&amp;&amp;!/\W/.test(U)){U=aa?U:U.toUpperCase();for(var V=0,T=Z.length;V&lt;T;V++){var Y=Z[V];if(Y){var W=Y.parentNode;Z[V]=W.nodeName===U?W:false}}}else{for(var V=0,T=Z.length;V&lt;T;V++){var Y=Z[V];if(Y){Z[V]=X?Y.parentNode:Y.parentNode===U}}if(X){F.filter(U,Z,true)}}},&quot;&quot;:function(W,U,Y){var V=L++,T=S;if(!U.match(/\W/)){var X=U=Y?U:U.toUpperCase();T=P}T(&quot;parentNode&quot;,U,V,W,X,Y)},&quot;~&quot;:function(W,U,Y){var V=L++,T=S;if(typeof U===&quot;string&quot;&amp;&amp;!U.match(/\W/)){var X=U=Y?U:U.toUpperCase();T=P}T(&quot;previousSibling&quot;,U,V,W,X,Y)}},find:{ID:function(U,V,W){if(typeof V.getElementById!==&quot;undefined&quot;&amp;&amp;!W){var T=V.getElementById(U[1]);return T?[T]:[]}},NAME:function(V,Y,Z){if(typeof Y.getElementsByName!==&quot;undefined&quot;){var U=[],X=Y.getElementsByName(V[1]);for(var W=0,T=X.length;W&lt;T;W++){if(X[W].getAttribute(&quot;name&quot;)===V[1]){U.push(X[W])}}return U.length===0?null:U}},TAG:function(T,U){return U.getElementsByTagName(T[1])}},preFilter:{CLASS:function(W,U,V,T,Z,aa){W=&quot; &quot;+W[1].replace(/\\/g,&quot;&quot;)+&quot; &quot;;if(aa){return W}for(var X=0,Y;(Y=U[X])!=null;X++){if(Y){if(Z^(Y.className&amp;&amp;(&quot; &quot;+Y.className+&quot; &quot;).indexOf(W)&gt;=0)){if(!V){T.push(Y)}}else{if(V){U[X]=false}}}}return false},ID:function(T){return T[1].replace(/\\/g,&quot;&quot;)},TAG:function(U,T){for(var V=0;T[V]===false;V++){}return T[V]&amp;&amp;Q(T[V])?U[1]:U[1].toUpperCase()},CHILD:function(T){if(T[1]==&quot;nth&quot;){var U=/(-?)(\d*)n((?:\+|-)?\d*)/.exec(T[2]==&quot;even&quot;&amp;&amp;&quot;2n&quot;||T[2]==&quot;odd&quot;&amp;&amp;&quot;2n+1&quot;||!/\D/.test(T[2])&amp;&amp;&quot;0n+&quot;+T[2]||T[2]);T[2]=(U[1]+(U[2]||1))-0;T[3]=U[3]-0}T[0]=L++;return T},ATTR:function(X,U,V,T,Y,Z){var W=X[1].replace(/\\/g,&quot;&quot;);if(!Z&amp;&amp;I.attrMap[W]){X[1]=I.attrMap[W]}if(X[2]===&quot;~=&quot;){X[4]=&quot; &quot;+X[4]+&quot; &quot;}return X},PSEUDO:function(X,U,V,T,Y){if(X[1]===&quot;not&quot;){if(X[3].match(R).length&gt;1||/^\w/.test(X[3])){X[3]=F(X[3],null,null,U)}else{var W=F.filter(X[3],U,V,true^Y);if(!V){T.push.apply(T,W)}return false}}else{if(I.match.POS.test(X[0])||I.match.CHILD.test(X[0])){return true}}return X},POS:function(T){T.unshift(true);return T}},filters:{enabled:function(T){return T.disabled===false&amp;&amp;T.type!==&quot;hidden&quot;},disabled:function(T){return T.disabled===true},checked:function(T){return T.checked===true},selected:function(T){T.parentNode.selectedIndex;return T.selected===true},parent:function(T){return !!T.firstChild},empty:function(T){return !T.firstChild},has:function(V,U,T){return !!F(T[3],V).length},header:function(T){return/h\d/i.test(T.nodeName)},text:function(T){return&quot;text&quot;===T.type},radio:function(T){return&quot;radio&quot;===T.type},checkbox:function(T){return&quot;checkbox&quot;===T.type},file:function(T){return&quot;file&quot;===T.type},password:function(T){return&quot;password&quot;===T.type},submit:function(T){return&quot;submit&quot;===T.type},image:function(T){return&quot;image&quot;===T.type},reset:function(T){return&quot;reset&quot;===T.type},button:function(T){return&quot;button&quot;===T.type||T.nodeName.toUpperCase()===&quot;BUTTON&quot;},input:function(T){return/input|select|textarea|button/i.test(T.nodeName)}},setFilters:{first:function(U,T){return T===0},last:function(V,U,T,W){return U===W.length-1},even:function(U,T){return T%2===0},odd:function(U,T){return T%2===1},lt:function(V,U,T){return U&lt;T[3]-0},gt:function(V,U,T){return U&gt;T[3]-0},nth:function(V,U,T){return T[3]-0==U},eq:function(V,U,T){return T[3]-0==U}},filter:{PSEUDO:function(Z,V,W,aa){var U=V[1],X=I.filters[U];if(X){return X(Z,W,V,aa)}else{if(U===&quot;contains&quot;){return(Z.textContent||Z.innerText||&quot;&quot;).indexOf(V[3])&gt;=0}else{if(U===&quot;not&quot;){var Y=V[3];for(var W=0,T=Y.length;W&lt;T;W++){if(Y[W]===Z){return false}}return true}}}},CHILD:function(T,W){var Z=W[1],U=T;switch(Z){case&quot;only&quot;:case&quot;first&quot;:while(U=U.previousSibling){if(U.nodeType===1){return false}}if(Z==&quot;first&quot;){return true}U=T;case&quot;last&quot;:while(U=U.nextSibling){if(U.nodeType===1){return false}}return true;case&quot;nth&quot;:var V=W[2],ac=W[3];if(V==1&amp;&amp;ac==0){return true}var Y=W[0],ab=T.parentNode;if(ab&amp;&amp;(ab.sizcache!==Y||!T.nodeIndex)){var X=0;for(U=ab.firstChild;U;U=U.nextSibling){if(U.nodeType===1){U.nodeIndex=++X}}ab.sizcache=Y}var aa=T.nodeIndex-ac;if(V==0){return aa==0}else{return(aa%V==0&amp;&amp;aa/V&gt;=0)}}},ID:function(U,T){return U.nodeType===1&amp;&amp;U.getAttribute(&quot;id&quot;)===T},TAG:function(U,T){return(T===&quot;*&quot;&amp;&amp;U.nodeType===1)||U.nodeName===T},CLASS:function(U,T){return(&quot; &quot;+(U.className||U.getAttribute(&quot;class&quot;))+&quot; &quot;).indexOf(T)&gt;-1},ATTR:function(Y,W){var V=W[1],T=I.attrHandle[V]?I.attrHandle[V](Y):Y[V]!=null?Y[V]:Y.getAttribute(V),Z=T+&quot;&quot;,X=W[2],U=W[4];return T==null?X===&quot;!=&quot;:X===&quot;=&quot;?Z===U:X===&quot;*=&quot;?Z.indexOf(U)&gt;=0:X===&quot;~=&quot;?(&quot; &quot;+Z+&quot; &quot;).indexOf(U)&gt;=0:!U?Z&amp;&amp;T!==false:X===&quot;!=&quot;?Z!=U:X===&quot;^=&quot;?Z.indexOf(U)===0:X===&quot;$=&quot;?Z.substr(Z.length-U.length)===U:X===&quot;|=&quot;?Z===U||Z.substr(0,U.length+1)===U+&quot;-&quot;:false},POS:function(X,U,V,Y){var T=U[2],W=I.setFilters[T];if(W){return W(X,V,U,Y)}}}};var M=I.match.POS;for(var O in I.match){I.match[O]=RegExp(I.match[O].source+/(?![^\[]*\])(?![^\(]*\))/.source)}var E=function(U,T){U=Array.prototype.slice.call(U);if(T){T.push.apply(T,U);return T}return U};try{Array.prototype.slice.call(document.documentElement.childNodes)}catch(N){E=function(X,W){var U=W||[];if(H.call(X)===&quot;[object Array]&quot;){Array.prototype.push.apply(U,X)}else{if(typeof X.length===&quot;number&quot;){for(var V=0,T=X.length;V&lt;T;V++){U.push(X[V])}}else{for(var V=0;X[V];V++){U.push(X[V])}}}return U}}var G;if(document.documentElement.compareDocumentPosition){G=function(U,T){var V=U.compareDocumentPosition(T)&amp;4?-1:U===T?0:1;if(V===0){hasDuplicate=true}return V}}else{if(&quot;sourceIndex&quot; in document.documentElement){G=function(U,T){var V=U.sourceIndex-T.sourceIndex;if(V===0){hasDuplicate=true}return V}}else{if(document.createRange){G=function(W,U){var V=W.ownerDocument.createRange(),T=U.ownerDocument.createRange();V.selectNode(W);V.collapse(true);T.selectNode(U);T.collapse(true);var X=V.compareBoundaryPoints(Range.START_TO_END,T);if(X===0){hasDuplicate=true}return X}}}}(function(){var U=document.createElement(&quot;form&quot;),V=&quot;script&quot;+(new Date).getTime();U.innerHTML=&quot;&lt;input name=&#39;&quot;+V+&quot;&#39;/&gt;&quot;;var T=document.documentElement;T.insertBefore(U,T.firstChild);if(!!document.getElementById(V)){I.find.ID=function(X,Y,Z){if(typeof Y.getElementById!==&quot;undefined&quot;&amp;&amp;!Z){var W=Y.getElementById(X[1]);return W?W.id===X[1]||typeof W.getAttributeNode!==&quot;undefined&quot;&amp;&amp;W.getAttributeNode(&quot;id&quot;).nodeValue===X[1]?[W]:g:[]}};I.filter.ID=function(Y,W){var X=typeof Y.getAttributeNode!==&quot;undefined&quot;&amp;&amp;Y.getAttributeNode(&quot;id&quot;);return Y.nodeType===1&amp;&amp;X&amp;&amp;X.nodeValue===W}}T.removeChild(U)})();(function(){var T=document.createElement(&quot;div&quot;);T.appendChild(document.createComment(&quot;&quot;));if(T.getElementsByTagName(&quot;*&quot;).length&gt;0){I.find.TAG=function(U,Y){var X=Y.getElementsByTagName(U[1]);if(U[1]===&quot;*&quot;){var W=[];for(var V=0;X[V];V++){if(X[V].nodeType===1){W.push(X[V])}}X=W}return X}}T.innerHTML=&quot;&lt;a href=&#39;#&#39;&gt;&lt;/a&gt;&quot;;if(T.firstChild&amp;&amp;typeof T.firstChild.getAttribute!==&quot;undefined&quot;&amp;&amp;T.firstChild.getAttribute(&quot;href&quot;)!==&quot;#&quot;){I.attrHandle.href=function(U){return U.getAttribute(&quot;href&quot;,2)}}})();if(document.querySelectorAll){(function(){var T=F,U=document.createElement(&quot;div&quot;);U.innerHTML=&quot;&lt;p class=&#39;TEST&#39;&gt;&lt;/p&gt;&quot;;if(U.querySelectorAll&amp;&amp;U.querySelectorAll(&quot;.TEST&quot;).length===0){return}F=function(Y,X,V,W){X=X||document;if(!W&amp;&amp;X.nodeType===9&amp;&amp;!Q(X)){try{return E(X.querySelectorAll(Y),V)}catch(Z){}}return T(Y,X,V,W)};F.find=T.find;F.filter=T.filter;F.selectors=T.selectors;F.matches=T.matches})()}if(document.getElementsByClassName&amp;&amp;document.documentElement.getElementsByClassName){(function(){var T=document.createElement(&quot;div&quot;);T.innerHTML=&quot;&lt;div class=&#39;test e&#39;&gt;&lt;/div&gt;&lt;div class=&#39;test&#39;&gt;&lt;/div&gt;&quot;;if(T.getElementsByClassName(&quot;e&quot;).length===0){return}T.lastChild.className=&quot;e&quot;;if(T.getElementsByClassName(&quot;e&quot;).length===1){return}I.order.splice(1,0,&quot;CLASS&quot;);I.find.CLASS=function(U,V,W){if(typeof V.getElementsByClassName!==&quot;undefined&quot;&amp;&amp;!W){return V.getElementsByClassName(U[1])}}})()}function P(U,Z,Y,ad,aa,ac){var ab=U==&quot;previousSibling&quot;&amp;&amp;!ac;for(var W=0,V=ad.length;W&lt;V;W++){var T=ad[W];if(T){if(ab&amp;&amp;T.nodeType===1){T.sizcache=Y;T.sizset=W}T=T[U];var X=false;while(T){if(T.sizcache===Y){X=ad[T.sizset];break}if(T.nodeType===1&amp;&amp;!ac){T.sizcache=Y;T.sizset=W}if(T.nodeName===Z){X=T;break}T=T[U]}ad[W]=X}}}function S(U,Z,Y,ad,aa,ac){var ab=U==&quot;previousSibling&quot;&amp;&amp;!ac;for(var W=0,V=ad.length;W&lt;V;W++){var T=ad[W];if(T){if(ab&amp;&amp;T.nodeType===1){T.sizcache=Y;T.sizset=W}T=T[U];var X=false;while(T){if(T.sizcache===Y){X=ad[T.sizset];break}if(T.nodeType===1){if(!ac){T.sizcache=Y;T.sizset=W}if(typeof Z!==&quot;string&quot;){if(T===Z){X=true;break}}else{if(F.filter(Z,[T]).length&gt;0){X=T;break}}}T=T[U]}ad[W]=X}}}var K=document.compareDocumentPosition?function(U,T){return U.compareDocumentPosition(T)&amp;16}:function(U,T){return U!==T&amp;&amp;(U.contains?U.contains(T):true)};var Q=function(T){return T.nodeType===9&amp;&amp;T.documentElement.nodeName!==&quot;HTML&quot;||!!T.ownerDocument&amp;&amp;Q(T.ownerDocument)};var J=function(T,aa){var W=[],X=&quot;&quot;,Y,V=aa.nodeType?[aa]:aa;while((Y=I.match.PSEUDO.exec(T))){X+=Y[0];T=T.replace(I.match.PSEUDO,&quot;&quot;)}T=I.relative[T]?T+&quot;*&quot;:T;for(var Z=0,U=V.length;Z&lt;U;Z++){F(T,V[Z],W)}return F.filter(X,W)};o.find=F;o.filter=F.filter;o.expr=F.selectors;o.expr[&quot;:&quot;]=o.expr.filters;F.selectors.filters.hidden=function(T){return T.offsetWidth===0||T.offsetHeight===0};F.selectors.filters.visible=function(T){return T.offsetWidth&gt;0||T.offsetHeight&gt;0};F.selectors.filters.animated=function(T){return o.grep(o.timers,function(U){return T===U.elem}).length};o.multiFilter=function(V,T,U){if(U){V=&quot;:not(&quot;+V+&quot;)&quot;}return F.matches(V,T)};o.dir=function(V,U){var T=[],W=V[U];while(W&amp;&amp;W!=document){if(W.nodeType==1){T.push(W)}W=W[U]}return T};o.nth=function(X,T,V,W){T=T||1;var U=0;for(;X;X=X[V]){if(X.nodeType==1&amp;&amp;++U==T){break}}return X};o.sibling=function(V,U){var T=[];for(;V;V=V.nextSibling){if(V.nodeType==1&amp;&amp;V!=U){T.push(V)}}return T};return;l.Sizzle=F})();o.event={add:function(I,F,H,K){if(I.nodeType==3||I.nodeType==8){return}if(I.setInterval&amp;&amp;I!=l){I=l}if(!H.guid){H.guid=this.guid++}if(K!==g){var G=H;H=this.proxy(G);H.data=K}var E=o.data(I,&quot;events&quot;)||o.data(I,&quot;events&quot;,{}),J=o.data(I,&quot;handle&quot;)||o.data(I,&quot;handle&quot;,function(){return typeof o!==&quot;undefined&quot;&amp;&amp;!o.event.triggered?o.event.handle.apply(arguments.callee.elem,arguments):g});J.elem=I;o.each(F.split(/\s+/),function(M,N){var O=N.split(&quot;.&quot;);N=O.shift();H.type=O.slice().sort().join(&quot;.&quot;);var L=E[N];if(o.event.specialAll[N]){o.event.specialAll[N].setup.call(I,K,O)}if(!L){L=E[N]={};if(!o.event.special[N]||o.event.special[N].setup.call(I,K,O)===false){if(I.addEventListener){I.addEventListener(N,J,false)}else{if(I.attachEvent){I.attachEvent(&quot;on&quot;+N,J)}}}}L[H.guid]=H;o.event.global[N]=true});I=null},guid:1,global:{},remove:function(K,H,J){if(K.nodeType==3||K.nodeType==8){return}var G=o.data(K,&quot;events&quot;),F,E;if(G){if(H===g||(typeof H===&quot;string&quot;&amp;&amp;H.charAt(0)==&quot;.&quot;)){for(var I in G){this.remove(K,I+(H||&quot;&quot;))}}else{if(H.type){J=H.handler;H=H.type}o.each(H.split(/\s+/),function(M,O){var Q=O.split(&quot;.&quot;);O=Q.shift();var N=RegExp(&quot;(^|\\.)&quot;+Q.slice().sort().join(&quot;.*\\.&quot;)+&quot;(\\.|$)&quot;);if(G[O]){if(J){delete G[O][J.guid]}else{for(var P in G[O]){if(N.test(G[O][P].type)){delete G[O][P]}}}if(o.event.specialAll[O]){o.event.specialAll[O].teardown.call(K,Q)}for(F in G[O]){break}if(!F){if(!o.event.special[O]||o.event.special[O].teardown.call(K,Q)===false){if(K.removeEventListener){K.removeEventListener(O,o.data(K,&quot;handle&quot;),false)}else{if(K.detachEvent){K.detachEvent(&quot;on&quot;+O,o.data(K,&quot;handle&quot;))}}}F=null;delete G[O]}}})}for(F in G){break}if(!F){var L=o.data(K,&quot;handle&quot;);if(L){L.elem=null}o.removeData(K,&quot;events&quot;);o.removeData(K,&quot;handle&quot;)}}},trigger:function(I,K,H,E){var G=I.type||I;if(!E){I=typeof I===&quot;object&quot;?I[h]?I:o.extend(o.Event(G),I):o.Event(G);if(G.indexOf(&quot;!&quot;)&gt;=0){I.type=G=G.slice(0,-1);I.exclusive=true}if(!H){I.stopPropagation();if(this.global[G]){o.each(o.cache,function(){if(this.events&amp;&amp;this.events[G]){o.event.trigger(I,K,this.handle.elem)}})}}if(!H||H.nodeType==3||H.nodeType==8){return g}I.result=g;I.target=H;K=o.makeArray(K);K.unshift(I)}I.currentTarget=H;var J=o.data(H,&quot;handle&quot;);if(J){J.apply(H,K)}if((!H[G]||(o.nodeName(H,&quot;a&quot;)&amp;&amp;G==&quot;click&quot;))&amp;&amp;H[&quot;on&quot;+G]&amp;&amp;H[&quot;on&quot;+G].apply(H,K)===false){I.result=false}if(!E&amp;&amp;H[G]&amp;&amp;!I.isDefaultPrevented()&amp;&amp;!(o.nodeName(H,&quot;a&quot;)&amp;&amp;G==&quot;click&quot;)){this.triggered=true;try{H[G]()}catch(L){}}this.triggered=false;if(!I.isPropagationStopped()){var F=H.parentNode||H.ownerDocument;if(F){o.event.trigger(I,K,F,true)}}},handle:function(K){var J,E;K=arguments[0]=o.event.fix(K||l.event);K.currentTarget=this;var L=K.type.split(&quot;.&quot;);K.type=L.shift();J=!L.length&amp;&amp;!K.exclusive;var I=RegExp(&quot;(^|\\.)&quot;+L.slice().sort().join(&quot;.*\\.&quot;)+&quot;(\\.|$)&quot;);E=(o.data(this,&quot;events&quot;)||{})[K.type];for(var G in E){var H=E[G];if(J||I.test(H.type)){K.handler=H;K.data=H.data;var F=H.apply(this,arguments);if(F!==g){K.result=F;if(F===false){K.preventDefault();K.stopPropagation()}}if(K.isImmediatePropagationStopped()){break}}}},props:&quot;altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode metaKey newValue originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which&quot;.split(&quot; &quot;),fix:function(H){if(H[h]){return H}var F=H;H=o.Event(F);for(var G=this.props.length,J;G;){J=this.props[--G];H[J]=F[J]}if(!H.target){H.target=H.srcElement||document}if(H.target.nodeType==3){H.target=H.target.parentNode}if(!H.relatedTarget&amp;&amp;H.fromElement){H.relatedTarget=H.fromElement==H.target?H.toElement:H.fromElement}if(H.pageX==null&amp;&amp;H.clientX!=null){var I=document.documentElement,E=document.body;H.pageX=H.clientX+(I&amp;&amp;I.scrollLeft||E&amp;&amp;E.scrollLeft||0)-(I.clientLeft||0);H.pageY=H.clientY+(I&amp;&amp;I.scrollTop||E&amp;&amp;E.scrollTop||0)-(I.clientTop||0)}if(!H.which&amp;&amp;((H.charCode||H.charCode===0)?H.charCode:H.keyCode)){H.which=H.charCode||H.keyCode}if(!H.metaKey&amp;&amp;H.ctrlKey){H.metaKey=H.ctrlKey}if(!H.which&amp;&amp;H.button){H.which=(H.button&amp;1?1:(H.button&amp;2?3:(H.button&amp;4?2:0)))}return H},proxy:function(F,E){E=E||function(){return F.apply(this,arguments)};E.guid=F.guid=F.guid||E.guid||this.guid++;return E},special:{ready:{setup:B,teardown:function(){}}},specialAll:{live:{setup:function(E,F){o.event.add(this,F[0],c)},teardown:function(G){if(G.length){var E=0,F=RegExp(&quot;(^|\\.)&quot;+G[0]+&quot;(\\.|$)&quot;);o.each((o.data(this,&quot;events&quot;).live||{}),function(){if(F.test(this.type)){E++}});if(E&lt;1){o.event.remove(this,G[0],c)}}}}}};o.Event=function(E){if(!this.preventDefault){return new o.Event(E)}if(E&amp;&amp;E.type){this.originalEvent=E;this.type=E.type}else{this.type=E}this.timeStamp=e();this[h]=true};function k(){return false}function u(){return true}o.Event.prototype={preventDefault:function(){this.isDefaultPrevented=u;var E=this.originalEvent;if(!E){return}if(E.preventDefault){E.preventDefault()}E.returnValue=false},stopPropagation:function(){this.isPropagationStopped=u;var E=this.originalEvent;if(!E){return}if(E.stopPropagation){E.stopPropagation()}E.cancelBubble=true},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=u;this.stopPropagation()},isDefaultPrevented:k,isPropagationStopped:k,isImmediatePropagationStopped:k};var a=function(F){var E=F.relatedTarget;while(E&amp;&amp;E!=this){try{E=E.parentNode}catch(G){E=this}}if(E!=this){F.type=F.data;o.event.handle.apply(this,arguments)}};o.each({mouseover:&quot;mouseenter&quot;,mouseout:&quot;mouseleave&quot;},function(F,E){o.event.special[E]={setup:function(){o.event.add(this,F,a,E)},teardown:function(){o.event.remove(this,F,a)}}});o.fn.extend({bind:function(F,G,E){return F==&quot;unload&quot;?this.one(F,G,E):this.each(function(){o.event.add(this,F,E||G,E&amp;&amp;G)})},one:function(G,H,F){var E=o.event.proxy(F||H,function(I){o(this).unbind(I,E);return(F||H).apply(this,arguments)});return this.each(function(){o.event.add(this,G,E,F&amp;&amp;H)})},unbind:function(F,E){return this.each(function(){o.event.remove(this,F,E)})},trigger:function(E,F){return this.each(function(){o.event.trigger(E,F,this)})},triggerHandler:function(E,G){if(this[0]){var F=o.Event(E);F.preventDefault();F.stopPropagation();o.event.trigger(F,G,this[0]);return F.result}},toggle:function(G){var E=arguments,F=1;while(F&lt;E.length){o.event.proxy(G,E[F++])}return this.click(o.event.proxy(G,function(H){this.lastToggle=(this.lastToggle||0)%F;H.preventDefault();return E[this.lastToggle++].apply(this,arguments)||false}))},hover:function(E,F){return this.mouseenter(E).mouseleave(F)},ready:function(E){B();if(o.isReady){E.call(document,o)}else{o.readyList.push(E)}return this},live:function(G,F){var E=o.event.proxy(F);E.guid+=this.selector+G;o(document).bind(i(G,this.selector),this.selector,E);return this},die:function(F,E){o(document).unbind(i(F,this.selector),E?{guid:E.guid+this.selector+F}:null);return this}});function c(H){var E=RegExp(&quot;(^|\\.)&quot;+H.type+&quot;(\\.|$)&quot;),G=true,F=[];o.each(o.data(this,&quot;events&quot;).live||[],function(I,J){if(E.test(J.type)){var K=o(H.target).closest(J.data)[0];if(K){F.push({elem:K,fn:J})}}});F.sort(function(J,I){return o.data(J.elem,&quot;closest&quot;)-o.data(I.elem,&quot;closest&quot;)});o.each(F,function(){if(this.fn.call(this.elem,H,this.fn.data)===false){return(G=false)}});return G}function i(F,E){return[&quot;live&quot;,F,E.replace(/\./g,&quot;`&quot;).replace(/ /g,&quot;|&quot;)].join(&quot;.&quot;)}o.extend({isReady:false,readyList:[],ready:function(){if(!o.isReady){o.isReady=true;if(o.readyList){o.each(o.readyList,function(){this.call(document,o)});o.readyList=null}o(document).triggerHandler(&quot;ready&quot;)}}});var x=false;function B(){if(x){return}x=true;if(document.addEventListener){document.addEventListener(&quot;DOMContentLoaded&quot;,function(){document.removeEventListener(&quot;DOMContentLoaded&quot;,arguments.callee,false);o.ready()},false)}else{if(document.attachEvent){document.attachEvent(&quot;onreadystatechange&quot;,function(){if(document.readyState===&quot;complete&quot;){document.detachEvent(&quot;onreadystatechange&quot;,arguments.callee);o.ready()}});if(document.documentElement.doScroll&amp;&amp;l==l.top){(function(){if(o.isReady){return}try{document.documentElement.doScroll(&quot;left&quot;)}catch(E){setTimeout(arguments.callee,0);return}o.ready()})()}}}o.event.add(l,&quot;load&quot;,o.ready)}o.each((&quot;blur,focus,load,resize,scroll,unload,click,dblclick,mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave,change,select,submit,keydown,keypress,keyup,error&quot;).split(&quot;,&quot;),function(F,E){o.fn[E]=function(G){return G?this.bind(E,G):this.trigger(E)}});o(l).bind(&quot;unload&quot;,function(){for(var E in o.cache){if(E!=1&amp;&amp;o.cache[E].handle){o.event.remove(o.cache[E].handle.elem)}}});(function(){o.support={};var F=document.documentElement,G=document.createElement(&quot;script&quot;),K=document.createElement(&quot;div&quot;),J=&quot;script&quot;+(new Date).getTime();K.style.display=&quot;none&quot;;K.innerHTML=&#39;   &lt;link/&gt;&lt;table&gt;&lt;/table&gt;&lt;a href=&quot;/a&quot; style=&quot;color:red;float:left;opacity:.5;&quot;&gt;a&lt;/a&gt;&lt;select&gt;&lt;option&gt;text&lt;/option&gt;&lt;/select&gt;&lt;object&gt;&lt;param/&gt;&lt;/object&gt;&#39;;var H=K.getElementsByTagName(&quot;*&quot;),E=K.getElementsByTagName(&quot;a&quot;)[0];if(!H||!H.length||!E){return}o.support={leadingWhitespace:K.firstChild.nodeType==3,tbody:!K.getElementsByTagName(&quot;tbody&quot;).length,objectAll:!!K.getElementsByTagName(&quot;object&quot;)[0].getElementsByTagName(&quot;*&quot;).length,htmlSerialize:!!K.getElementsByTagName(&quot;link&quot;).length,style:/red/.test(E.getAttribute(&quot;style&quot;)),hrefNormalized:E.getAttribute(&quot;href&quot;)===&quot;/a&quot;,opacity:E.style.opacity===&quot;0.5&quot;,cssFloat:!!E.style.cssFloat,scriptEval:false,noCloneEvent:true,boxModel:null};G.type=&quot;text/javascript&quot;;try{G.appendChild(document.createTextNode(&quot;window.&quot;+J+&quot;=1;&quot;))}catch(I){}F.insertBefore(G,F.firstChild);if(l[J]){o.support.scriptEval=true;delete l[J]}F.removeChild(G);if(K.attachEvent&amp;&amp;K.fireEvent){K.attachEvent(&quot;onclick&quot;,function(){o.support.noCloneEvent=false;K.detachEvent(&quot;onclick&quot;,arguments.callee)});K.cloneNode(true).fireEvent(&quot;onclick&quot;)}o(function(){var L=document.createElement(&quot;div&quot;);L.style.width=L.style.paddingLeft=&quot;1px&quot;;document.body.appendChild(L);o.boxModel=o.support.boxModel=L.offsetWidth===2;document.body.removeChild(L).style.display=&quot;none&quot;})})();var w=o.support.cssFloat?&quot;cssFloat&quot;:&quot;styleFloat&quot;;o.props={&quot;for&quot;:&quot;htmlFor&quot;,&quot;class&quot;:&quot;className&quot;,&quot;float&quot;:w,cssFloat:w,styleFloat:w,readonly:&quot;readOnly&quot;,maxlength:&quot;maxLength&quot;,cellspacing:&quot;cellSpacing&quot;,rowspan:&quot;rowSpan&quot;,tabindex:&quot;tabIndex&quot;};o.fn.extend({_load:o.fn.load,load:function(G,J,K){if(typeof G!==&quot;string&quot;){return this._load(G)}var I=G.indexOf(&quot; &quot;);if(I&gt;=0){var E=G.slice(I,G.length);G=G.slice(0,I)}var H=&quot;GET&quot;;if(J){if(o.isFunction(J)){K=J;J=null}else{if(typeof J===&quot;object&quot;){J=o.param(J);H=&quot;POST&quot;}}}var F=this;o.ajax({url:G,type:H,dataType:&quot;html&quot;,data:J,complete:function(M,L){if(L==&quot;success&quot;||L==&quot;notmodified&quot;){F.html(E?o(&quot;&lt;div/&gt;&quot;).append(M.responseText.replace(/&lt;script(.|\s)*?\/script&gt;/g,&quot;&quot;)).find(E):M.responseText)}if(K){F.each(K,[M.responseText,L,M])}}});return this},serialize:function(){return o.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?o.makeArray(this.elements):this}).filter(function(){return this.name&amp;&amp;!this.disabled&amp;&amp;(this.checked||/select|textarea/i.test(this.nodeName)||/text|hidden|password|search/i.test(this.type))}).map(function(E,F){var G=o(this).val();return G==null?null:o.isArray(G)?o.map(G,function(I,H){return{name:F.name,value:I}}):{name:F.name,value:G}}).get()}});o.each(&quot;ajaxStart,ajaxStop,ajaxComplete,ajaxError,ajaxSuccess,ajaxSend&quot;.split(&quot;,&quot;),function(E,F){o.fn[F]=function(G){return this.bind(F,G)}});var r=e();o.extend({get:function(E,G,H,F){if(o.isFunction(G)){H=G;G=null}return o.ajax({type:&quot;GET&quot;,url:E,data:G,success:H,dataType:F})},getScript:function(E,F){return o.get(E,null,F,&quot;script&quot;)},getJSON:function(E,F,G){return o.get(E,F,G,&quot;json&quot;)},post:function(E,G,H,F){if(o.isFunction(G)){H=G;G={}}return o.ajax({type:&quot;POST&quot;,url:E,data:G,success:H,dataType:F})},ajaxSetup:function(E){o.extend(o.ajaxSettings,E)},ajaxSettings:{url:location.href,global:true,type:&quot;GET&quot;,contentType:&quot;application/x-www-form-urlencoded&quot;,processData:true,async:true,xhr:function(){return l.ActiveXObject?new ActiveXObject(&quot;Microsoft.XMLHTTP&quot;):new XMLHttpRequest()},accepts:{xml:&quot;application/xml, text/xml&quot;,html:&quot;text/html&quot;,script:&quot;text/javascript, application/javascript&quot;,json:&quot;application/json, text/javascript&quot;,text:&quot;text/plain&quot;,_default:&quot;*/*&quot;}},lastModified:{},ajax:function(M){M=o.extend(true,M,o.extend(true,{},o.ajaxSettings,M));var W,F=/=\?(&amp;|$)/g,R,V,G=M.type.toUpperCase();if(M.data&amp;&amp;M.processData&amp;&amp;typeof M.data!==&quot;string&quot;){M.data=o.param(M.data)}if(M.dataType==&quot;jsonp&quot;){if(G==&quot;GET&quot;){if(!M.url.match(F)){M.url+=(M.url.match(/\?/)?&quot;&amp;&quot;:&quot;?&quot;)+(M.jsonp||&quot;callback&quot;)+&quot;=?&quot;}}else{if(!M.data||!M.data.match(F)){M.data=(M.data?M.data+&quot;&amp;&quot;:&quot;&quot;)+(M.jsonp||&quot;callback&quot;)+&quot;=?&quot;}}M.dataType=&quot;json&quot;}if(M.dataType==&quot;json&quot;&amp;&amp;(M.data&amp;&amp;M.data.match(F)||M.url.match(F))){W=&quot;jsonp&quot;+r++;if(M.data){M.data=(M.data+&quot;&quot;).replace(F,&quot;=&quot;+W+&quot;$1&quot;)}M.url=M.url.replace(F,&quot;=&quot;+W+&quot;$1&quot;);M.dataType=&quot;script&quot;;l[W]=function(X){V=X;I();L();l[W]=g;try{delete l[W]}catch(Y){}if(H){H.removeChild(T)}}}if(M.dataType==&quot;script&quot;&amp;&amp;M.cache==null){M.cache=false}if(M.cache===false&amp;&amp;G==&quot;GET&quot;){var E=e();var U=M.url.replace(/(\?|&amp;)_=.*?(&amp;|$)/,&quot;$1_=&quot;+E+&quot;$2&quot;);M.url=U+((U==M.url)?(M.url.match(/\?/)?&quot;&amp;&quot;:&quot;?&quot;)+&quot;_=&quot;+E:&quot;&quot;)}if(M.data&amp;&amp;G==&quot;GET&quot;){M.url+=(M.url.match(/\?/)?&quot;&amp;&quot;:&quot;?&quot;)+M.data;M.data=null}if(M.global&amp;&amp;!o.active++){o.event.trigger(&quot;ajaxStart&quot;)}var Q=/^(\w+:)?\/\/([^\/?#]+)/.exec(M.url);if(M.dataType==&quot;script&quot;&amp;&amp;G==&quot;GET&quot;&amp;&amp;Q&amp;&amp;(Q[1]&amp;&amp;Q[1]!=location.protocol||Q[2]!=location.host)){var H=document.getElementsByTagName(&quot;head&quot;)[0];var T=document.createElement(&quot;script&quot;);T.src=M.url;if(M.scriptCharset){T.charset=M.scriptCharset}if(!W){var O=false;T.onload=T.onreadystatechange=function(){if(!O&amp;&amp;(!this.readyState||this.readyState==&quot;loaded&quot;||this.readyState==&quot;complete&quot;)){O=true;I();L();T.onload=T.onreadystatechange=null;H.removeChild(T)}}}H.appendChild(T);return g}var K=false;var J=M.xhr();if(M.username){J.open(G,M.url,M.async,M.username,M.password)}else{J.open(G,M.url,M.async)}try{if(M.data){J.setRequestHeader(&quot;Content-Type&quot;,M.contentType)}if(M.ifModified){J.setRequestHeader(&quot;If-Modified-Since&quot;,o.lastModified[M.url]||&quot;Thu, 01 Jan 1970 00:00:00 GMT&quot;)}J.setRequestHeader(&quot;X-Requested-With&quot;,&quot;XMLHttpRequest&quot;);J.setRequestHeader(&quot;Accept&quot;,M.dataType&amp;&amp;M.accepts[M.dataType]?M.accepts[M.dataType]+&quot;, */*&quot;:M.accepts._default)}catch(S){}if(M.beforeSend&amp;&amp;M.beforeSend(J,M)===false){if(M.global&amp;&amp;!--o.active){o.event.trigger(&quot;ajaxStop&quot;)}J.abort();return false}if(M.global){o.event.trigger(&quot;ajaxSend&quot;,[J,M])}var N=function(X){if(J.readyState==0){if(P){clearInterval(P);P=null;if(M.global&amp;&amp;!--o.active){o.event.trigger(&quot;ajaxStop&quot;)}}}else{if(!K&amp;&amp;J&amp;&amp;(J.readyState==4||X==&quot;timeout&quot;)){K=true;if(P){clearInterval(P);P=null}R=X==&quot;timeout&quot;?&quot;timeout&quot;:!o.httpSuccess(J)?&quot;error&quot;:M.ifModified&amp;&amp;o.httpNotModified(J,M.url)?&quot;notmodified&quot;:&quot;success&quot;;if(R==&quot;success&quot;){try{V=o.httpData(J,M.dataType,M)}catch(Z){R=&quot;parsererror&quot;}}if(R==&quot;success&quot;){var Y;try{Y=J.getResponseHeader(&quot;Last-Modified&quot;)}catch(Z){}if(M.ifModified&amp;&amp;Y){o.lastModified[M.url]=Y}if(!W){I()}}else{o.handleError(M,J,R)}L();if(X){J.abort()}if(M.async){J=null}}}};if(M.async){var P=setInterval(N,13);if(M.timeout&gt;0){setTimeout(function(){if(J&amp;&amp;!K){N(&quot;timeout&quot;)}},M.timeout)}}try{J.send(M.data)}catch(S){o.handleError(M,J,null,S)}if(!M.async){N()}function I(){if(M.success){M.success(V,R)}if(M.global){o.event.trigger(&quot;ajaxSuccess&quot;,[J,M])}}function L(){if(M.complete){M.complete(J,R)}if(M.global){o.event.trigger(&quot;ajaxComplete&quot;,[J,M])}if(M.global&amp;&amp;!--o.active){o.event.trigger(&quot;ajaxStop&quot;)}}return J},handleError:function(F,H,E,G){if(F.error){F.error(H,E,G)}if(F.global){o.event.trigger(&quot;ajaxError&quot;,[H,F,G])}},active:0,httpSuccess:function(F){try{return !F.status&amp;&amp;location.protocol==&quot;file:&quot;||(F.status&gt;=200&amp;&amp;F.status&lt;300)||F.status==304||F.status==1223}catch(E){}return false},httpNotModified:function(G,E){try{var H=G.getResponseHeader(&quot;Last-Modified&quot;);return G.status==304||H==o.lastModified[E]}catch(F){}return false},httpData:function(J,H,G){var F=J.getResponseHeader(&quot;content-type&quot;),E=H==&quot;xml&quot;||!H&amp;&amp;F&amp;&amp;F.indexOf(&quot;xml&quot;)&gt;=0,I=E?J.responseXML:J.responseText;if(E&amp;&amp;I.documentElement.tagName==&quot;parsererror&quot;){throw&quot;parsererror&quot;}if(G&amp;&amp;G.dataFilter){I=G.dataFilter(I,H)}if(typeof I===&quot;string&quot;){if(H==&quot;script&quot;){o.globalEval(I)}if(H==&quot;json&quot;){I=l[&quot;eval&quot;](&quot;(&quot;+I+&quot;)&quot;)}}return I},param:function(E){var G=[];function H(I,J){G[G.length]=encodeURIComponent(I)+&quot;=&quot;+encodeURIComponent(J)}if(o.isArray(E)||E.jquery){o.each(E,function(){H(this.name,this.value)})}else{for(var F in E){if(o.isArray(E[F])){o.each(E[F],function(){H(F,this)})}else{H(F,o.isFunction(E[F])?E[F]():E[F])}}}return G.join(&quot;&amp;&quot;).replace(/%20/g,&quot;+&quot;)}});var m={},n,d=[[&quot;height&quot;,&quot;marginTop&quot;,&quot;marginBottom&quot;,&quot;paddingTop&quot;,&quot;paddingBottom&quot;],[&quot;width&quot;,&quot;marginLeft&quot;,&quot;marginRight&quot;,&quot;paddingLeft&quot;,&quot;paddingRight&quot;],[&quot;opacity&quot;]];function t(F,E){var G={};o.each(d.concat.apply([],d.slice(0,E)),function(){G[this]=F});return G}o.fn.extend({show:function(J,L){if(J){return this.animate(t(&quot;show&quot;,3),J,L)}else{for(var H=0,F=this.length;H&lt;F;H++){var E=o.data(this[H],&quot;olddisplay&quot;);this[H].style.display=E||&quot;&quot;;if(o.css(this[H],&quot;display&quot;)===&quot;none&quot;){var G=this[H].tagName,K;if(m[G]){K=m[G]}else{var I=o(&quot;&lt;&quot;+G+&quot; /&gt;&quot;).appendTo(&quot;body&quot;);K=I.css(&quot;display&quot;);if(K===&quot;none&quot;){K=&quot;block&quot;}I.remove();m[G]=K}o.data(this[H],&quot;olddisplay&quot;,K)}}for(var H=0,F=this.length;H&lt;F;H++){this[H].style.display=o.data(this[H],&quot;olddisplay&quot;)||&quot;&quot;}return this}},hide:function(H,I){if(H){return this.animate(t(&quot;hide&quot;,3),H,I)}else{for(var G=0,F=this.length;G&lt;F;G++){var E=o.data(this[G],&quot;olddisplay&quot;);if(!E&amp;&amp;E!==&quot;none&quot;){o.data(this[G],&quot;olddisplay&quot;,o.css(this[G],&quot;display&quot;))}}for(var G=0,F=this.length;G&lt;F;G++){this[G].style.display=&quot;none&quot;}return this}},_toggle:o.fn.toggle,toggle:function(G,F){var E=typeof G===&quot;boolean&quot;;return o.isFunction(G)&amp;&amp;o.isFunction(F)?this._toggle.apply(this,arguments):G==null||E?this.each(function(){var H=E?G:o(this).is(&quot;:hidden&quot;);o(this)[H?&quot;show&quot;:&quot;hide&quot;]()}):this.animate(t(&quot;toggle&quot;,3),G,F)},fadeTo:function(E,G,F){return this.animate({opacity:G},E,F)},animate:function(I,F,H,G){var E=o.speed(F,H,G);return this[E.queue===false?&quot;each&quot;:&quot;queue&quot;](function(){var K=o.extend({},E),M,L=this.nodeType==1&amp;&amp;o(this).is(&quot;:hidden&quot;),J=this;for(M in I){if(I[M]==&quot;hide&quot;&amp;&amp;L||I[M]==&quot;show&quot;&amp;&amp;!L){return K.complete.call(this)}if((M==&quot;height&quot;||M==&quot;width&quot;)&amp;&amp;this.style){K.display=o.css(this,&quot;display&quot;);K.overflow=this.style.overflow}}if(K.overflow!=null){this.style.overflow=&quot;hidden&quot;}K.curAnim=o.extend({},I);o.each(I,function(O,S){var R=new o.fx(J,K,O);if(/toggle|show|hide/.test(S)){R[S==&quot;toggle&quot;?L?&quot;show&quot;:&quot;hide&quot;:S](I)}else{var Q=S.toString().match(/^([+-]=)?([\d+-.]+)(.*)$/),T=R.cur(true)||0;if(Q){var N=parseFloat(Q[2]),P=Q[3]||&quot;px&quot;;if(P!=&quot;px&quot;){J.style[O]=(N||1)+P;T=((N||1)/R.cur(true))*T;J.style[O]=T+P}if(Q[1]){N=((Q[1]==&quot;-=&quot;?-1:1)*N)+T}R.custom(T,N,P)}else{R.custom(T,S,&quot;&quot;)}}});return true})},stop:function(F,E){var G=o.timers;if(F){this.queue([])}this.each(function(){for(var H=G.length-1;H&gt;=0;H--){if(G[H].elem==this){if(E){G[H](true)}G.splice(H,1)}}});if(!E){this.dequeue()}return this}});o.each({slideDown:t(&quot;show&quot;,1),slideUp:t(&quot;hide&quot;,1),slideToggle:t(&quot;toggle&quot;,1),fadeIn:{opacity:&quot;show&quot;},fadeOut:{opacity:&quot;hide&quot;}},function(E,F){o.fn[E]=function(G,H){return this.animate(F,G,H)}});o.extend({speed:function(G,H,F){var E=typeof G===&quot;object&quot;?G:{complete:F||!F&amp;&amp;H||o.isFunction(G)&amp;&amp;G,duration:G,easing:F&amp;&amp;H||H&amp;&amp;!o.isFunction(H)&amp;&amp;H};E.duration=o.fx.off?0:typeof E.duration===&quot;number&quot;?E.duration:o.fx.speeds[E.duration]||o.fx.speeds._default;E.old=E.complete;E.complete=function(){if(E.queue!==false){o(this).dequeue()}if(o.isFunction(E.old)){E.old.call(this)}};return E},easing:{linear:function(G,H,E,F){return E+F*G},swing:function(G,H,E,F){return((-Math.cos(G*Math.PI)/2)+0.5)*F+E}},timers:[],fx:function(F,E,G){this.options=E;this.elem=F;this.prop=G;if(!E.orig){E.orig={}}}});o.fx.prototype={update:function(){if(this.options.step){this.options.step.call(this.elem,this.now,this)}(o.fx.step[this.prop]||o.fx.step._default)(this);if((this.prop==&quot;height&quot;||this.prop==&quot;width&quot;)&amp;&amp;this.elem.style){this.elem.style.display=&quot;block&quot;}},cur:function(F){if(this.elem[this.prop]!=null&amp;&amp;(!this.elem.style||this.elem.style[this.prop]==null)){return this.elem[this.prop]}var E=parseFloat(o.css(this.elem,this.prop,F));return E&amp;&amp;E&gt;-10000?E:parseFloat(o.curCSS(this.elem,this.prop))||0},custom:function(I,H,G){this.startTime=e();this.start=I;this.end=H;this.unit=G||this.unit||&quot;px&quot;;this.now=this.start;this.pos=this.state=0;var E=this;function F(J){return E.step(J)}F.elem=this.elem;if(F()&amp;&amp;o.timers.push(F)&amp;&amp;!n){n=setInterval(function(){var K=o.timers;for(var J=0;J&lt;K.length;J++){if(!K[J]()){K.splice(J--,1)}}if(!K.length){clearInterval(n);n=g}},13)}},show:function(){this.options.orig[this.prop]=o.attr(this.elem.style,this.prop);this.options.show=true;this.custom(this.prop==&quot;width&quot;||this.prop==&quot;height&quot;?1:0,this.cur());o(this.elem).show()},hide:function(){this.options.orig[this.prop]=o.attr(this.elem.style,this.prop);this.options.hide=true;this.custom(this.cur(),0)},step:function(H){var G=e();if(H||G&gt;=this.options.duration+this.startTime){this.now=this.end;this.pos=this.state=1;this.update();this.options.curAnim[this.prop]=true;var E=true;for(var F in this.options.curAnim){if(this.options.curAnim[F]!==true){E=false}}if(E){if(this.options.display!=null){this.elem.style.overflow=this.options.overflow;this.elem.style.display=this.options.display;if(o.css(this.elem,&quot;display&quot;)==&quot;none&quot;){this.elem.style.display=&quot;block&quot;}}if(this.options.hide){o(this.elem).hide()}if(this.options.hide||this.options.show){for(var I in this.options.curAnim){o.attr(this.elem.style,I,this.options.orig[I])}}this.options.complete.call(this.elem)}return false}else{var J=G-this.startTime;this.state=J/this.options.duration;this.pos=o.easing[this.options.easing||(o.easing.swing?&quot;swing&quot;:&quot;linear&quot;)](this.state,J,0,1,this.options.duration);this.now=this.start+((this.end-this.start)*this.pos);this.update()}return true}};o.extend(o.fx,{speeds:{slow:600,fast:200,_default:400},step:{opacity:function(E){o.attr(E.elem.style,&quot;opacity&quot;,E.now)},_default:function(E){if(E.elem.style&amp;&amp;E.elem.style[E.prop]!=null){E.elem.style[E.prop]=E.now+E.unit}else{E.elem[E.prop]=E.now}}}});if(document.documentElement.getBoundingClientRect){o.fn.offset=function(){if(!this[0]){return{top:0,left:0}}if(this[0]===this[0].ownerDocument.body){return o.offset.bodyOffset(this[0])}var G=this[0].getBoundingClientRect(),J=this[0].ownerDocument,F=J.body,E=J.documentElement,L=E.clientTop||F.clientTop||0,K=E.clientLeft||F.clientLeft||0,I=G.top+(self.pageYOffset||o.boxModel&amp;&amp;E.scrollTop||F.scrollTop)-L,H=G.left+(self.pageXOffset||o.boxModel&amp;&amp;E.scrollLeft||F.scrollLeft)-K;return{top:I,left:H}}}else{o.fn.offset=function(){if(!this[0]){return{top:0,left:0}}if(this[0]===this[0].ownerDocument.body){return o.offset.bodyOffset(this[0])}o.offset.initialized||o.offset.initialize();var J=this[0],G=J.offsetParent,F=J,O=J.ownerDocument,M,H=O.documentElement,K=O.body,L=O.defaultView,E=L.getComputedStyle(J,null),N=J.offsetTop,I=J.offsetLeft;while((J=J.parentNode)&amp;&amp;J!==K&amp;&amp;J!==H){M=L.getComputedStyle(J,null);N-=J.scrollTop,I-=J.scrollLeft;if(J===G){N+=J.offsetTop,I+=J.offsetLeft;if(o.offset.doesNotAddBorder&amp;&amp;!(o.offset.doesAddBorderForTableAndCells&amp;&amp;/^t(able|d|h)$/i.test(J.tagName))){N+=parseInt(M.borderTopWidth,10)||0,I+=parseInt(M.borderLeftWidth,10)||0}F=G,G=J.offsetParent}if(o.offset.subtractsBorderForOverflowNotVisible&amp;&amp;M.overflow!==&quot;visible&quot;){N+=parseInt(M.borderTopWidth,10)||0,I+=parseInt(M.borderLeftWidth,10)||0}E=M}if(E.position===&quot;relative&quot;||E.position===&quot;static&quot;){N+=K.offsetTop,I+=K.offsetLeft}if(E.position===&quot;fixed&quot;){N+=Math.max(H.scrollTop,K.scrollTop),I+=Math.max(H.scrollLeft,K.scrollLeft)}return{top:N,left:I}}}o.offset={initialize:function(){if(this.initialized){return}var L=document.body,F=document.createElement(&quot;div&quot;),H,G,N,I,M,E,J=L.style.marginTop,K=&#39;&lt;div style=&quot;position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;&quot;&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;table style=&quot;position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;&lt;tr&gt;&lt;td&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;&#39;;M={position:&quot;absolute&quot;,top:0,left:0,margin:0,border:0,width:&quot;1px&quot;,height:&quot;1px&quot;,visibility:&quot;hidden&quot;};for(E in M){F.style[E]=M[E]}F.innerHTML=K;L.insertBefore(F,L.firstChild);H=F.firstChild,G=H.firstChild,I=H.nextSibling.firstChild.firstChild;this.doesNotAddBorder=(G.offsetTop!==5);this.doesAddBorderForTableAndCells=(I.offsetTop===5);H.style.overflow=&quot;hidden&quot;,H.style.position=&quot;relative&quot;;this.subtractsBorderForOverflowNotVisible=(G.offsetTop===-5);L.style.marginTop=&quot;1px&quot;;this.doesNotIncludeMarginInBodyOffset=(L.offsetTop===0);L.style.marginTop=J;L.removeChild(F);this.initialized=true},bodyOffset:function(E){o.offset.initialized||o.offset.initialize();var G=E.offsetTop,F=E.offsetLeft;if(o.offset.doesNotIncludeMarginInBodyOffset){G+=parseInt(o.curCSS(E,&quot;marginTop&quot;,true),10)||0,F+=parseInt(o.curCSS(E,&quot;marginLeft&quot;,true),10)||0}return{top:G,left:F}}};o.fn.extend({position:function(){var I=0,H=0,F;if(this[0]){var G=this.offsetParent(),J=this.offset(),E=/^body|html$/i.test(G[0].tagName)?{top:0,left:0}:G.offset();J.top-=j(this,&quot;marginTop&quot;);J.left-=j(this,&quot;marginLeft&quot;);E.top+=j(G,&quot;borderTopWidth&quot;);E.left+=j(G,&quot;borderLeftWidth&quot;);F={top:J.top-E.top,left:J.left-E.left}}return F},offsetParent:function(){var E=this[0].offsetParent||document.body;while(E&amp;&amp;(!/^body|html$/i.test(E.tagName)&amp;&amp;o.css(E,&quot;position&quot;)==&quot;static&quot;)){E=E.offsetParent}return o(E)}});o.each([&quot;Left&quot;,&quot;Top&quot;],function(F,E){var G=&quot;scroll&quot;+E;o.fn[G]=function(H){if(!this[0]){return null}return H!==g?this.each(function(){this==l||this==document?l.scrollTo(!F?H:o(l).scrollLeft(),F?H:o(l).scrollTop()):this[G]=H}):this[0]==l||this[0]==document?self[F?&quot;pageYOffset&quot;:&quot;pageXOffset&quot;]||o.boxModel&amp;&amp;document.documentElement[G]||document.body[G]:this[0][G]}});o.each([&quot;Height&quot;,&quot;Width&quot;],function(I,G){var E=I?&quot;Left&quot;:&quot;Top&quot;,H=I?&quot;Right&quot;:&quot;Bottom&quot;,F=G.toLowerCase();o.fn[&quot;inner&quot;+G]=function(){return this[0]?o.css(this[0],F,false,&quot;padding&quot;):null};o.fn[&quot;outer&quot;+G]=function(K){return this[0]?o.css(this[0],F,false,K?&quot;margin&quot;:&quot;border&quot;):null};var J=G.toLowerCase();o.fn[J]=function(K){return this[0]==l?document.compatMode==&quot;CSS1Compat&quot;&amp;&amp;document.documentElement[&quot;client&quot;+G]||document.body[&quot;client&quot;+G]:this[0]==document?Math.max(document.documentElement[&quot;client&quot;+G],document.body[&quot;scroll&quot;+G],document.documentElement[&quot;scroll&quot;+G],document.body[&quot;offset&quot;+G],document.documentElement[&quot;offset&quot;+G]):K===g?(this.length?o.css(this[0],J):null):this.css(J,typeof K===&quot;string&quot;?K:K+&quot;px&quot;)}})})();</td>
      </tr>
</table>

  <div class="BlobToolbar position-absolute js-file-line-actions dropdown js-menu-container js-select-menu d-none" aria-hidden="true">
    <button class="btn-octicon ml-0 px-2 p-0 bg-white border border-gray-dark rounded-1 dropdown-toggle js-menu-target" id="js-file-line-action-button" type="button" aria-expanded="false" aria-haspopup="true" aria-label="Inline file action toolbar" aria-controls="inline-file-actions">
      <svg aria-hidden="true" class="octicon octicon-kebab-horizontal" height="16" version="1.1" viewBox="0 0 13 16" width="13"><path fill-rule="evenodd" d="M1.5 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
    </button>
    <div class="dropdown-menu-content js-menu-content" id="inline-file-actions">
      <ul class="BlobToolbar-dropdown dropdown-menu dropdown-menu-se mt-2">
        <li><a class="js-zeroclipboard dropdown-item" style="cursor:pointer;" id="js-copy-lines" data-original-text="Copy lines">Copy lines</a></li>
        <li><a class="js-zeroclipboard dropdown-item" id= "js-copy-permalink" style="cursor:pointer;" data-original-text="Copy permalink">Copy permalink</a></li>
        <li><a href="/abuzer/ci-chat/blame/1f05b3374c9da6407e6dfbb00351386a0b50d6b2/js/chat/jquery.js" class="dropdown-item js-update-url-with-hash" id="js-view-git-blame">View git blame</a></li>
          <li><a href="/abuzer/ci-chat/issues/new" class="dropdown-item" id="js-new-issue">Open new issue</a></li>
      </ul>
    </div>
  </div>

  </div>

  </div>

  <button type="button" data-facebox="#jump-to-line" data-facebox-class="linejump" data-hotkey="l" class="d-none">Jump to Line</button>
  <div id="jump-to-line" style="display:none">
    <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="" class="js-jump-to-line-form" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
      <input class="form-control linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" aria-label="Jump to line" autofocus>
      <button type="submit" class="btn">Go</button>
</form>  </div>


  </div>
  <div class="modal-backdrop js-touch-events"></div>
</div>

    </div>
  </div>

  </div>

      
<div class="footer container-lg px-3" role="contentinfo">
  <div class="position-relative d-flex flex-justify-between py-6 mt-6 f6 text-gray border-top border-gray-light ">
    <ul class="list-style-none d-flex flex-wrap ">
      <li class="mr-3">&copy; 2018 <span title="0.24131s from unicorn-4069292164-0zhsr">GitHub</span>, Inc.</li>
        <li class="mr-3"><a href="https://help.github.com/articles/github-terms-of-service/" data-ga-click="Footer, go to terms, text:terms">Terms</a></li>
        <li class="mr-3"><a href="https://github.com/site/privacy" data-ga-click="Footer, go to privacy, text:privacy">Privacy</a></li>
        <li class="mr-3"><a href="https://help.github.com/articles/github-security/" data-ga-click="Footer, go to security, text:security">Security</a></li>
        <li class="mr-3"><a href="https://status.github.com/" data-ga-click="Footer, go to status, text:status">Status</a></li>
        <li><a href="https://help.github.com" data-ga-click="Footer, go to help, text:help">Help</a></li>
    </ul>

    <a href="https://github.com" aria-label="Homepage" class="footer-octicon" title="GitHub">
      <svg aria-hidden="true" class="octicon octicon-mark-github" height="24" version="1.1" viewBox="0 0 16 16" width="24"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg>
</a>
    <ul class="list-style-none d-flex flex-wrap ">
        <li class="mr-3"><a href="https://github.com/contact" data-ga-click="Footer, go to contact, text:contact">Contact GitHub</a></li>
      <li class="mr-3"><a href="https://developer.github.com" data-ga-click="Footer, go to api, text:api">API</a></li>
      <li class="mr-3"><a href="https://training.github.com" data-ga-click="Footer, go to training, text:training">Training</a></li>
      <li class="mr-3"><a href="https://shop.github.com" data-ga-click="Footer, go to shop, text:shop">Shop</a></li>
        <li class="mr-3"><a href="https://github.com/blog" data-ga-click="Footer, go to blog, text:blog">Blog</a></li>
        <li><a href="https://github.com/about" data-ga-click="Footer, go to about, text:about">About</a></li>

    </ul>
  </div>
</div>



  <div id="ajax-error-message" class="ajax-error-message flash flash-error">
    <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"/></svg>
    <button type="button" class="flash-close js-ajax-error-dismiss" aria-label="Dismiss error">
      <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
    </button>
    You can't perform that action at this time.
  </div>


    
    <script crossorigin="anonymous" integrity="sha512-6oz7cTsS3E5enQjh4gWKU23tC78zIZqVJ1o5zMLCsAv5EEnmNsopwszDz7zx5IGWXU+H+sqeC5pHbt1Yxmh+sw==" src="https://assets-cdn.github.com/assets/frameworks-ea8cfb713b12.js" type="application/javascript"></script>
    
    <script async="async" crossorigin="anonymous" integrity="sha512-358sdlPZkeKuJcLryrhVzAQ8GT/rkxIhY9umHe8yxrQCxzpu+fnUEHDZ+quyfQca0egthMbUHStyGY/74pMz3g==" src="https://assets-cdn.github.com/assets/github-df9f2c7653d9.js" type="application/javascript"></script>
    
    
    
    
  <div class="js-stale-session-flash stale-session-flash flash flash-warn flash-banner d-none">
    <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"/></svg>
    <span class="signed-in-tab-flash">You signed in with another tab or window. <a href="">Reload</a> to refresh your session.</span>
    <span class="signed-out-tab-flash">You signed out in another tab or window. <a href="">Reload</a> to refresh your session.</span>
  </div>
  <div class="facebox" id="facebox" style="display:none;">
  <div class="facebox-popup">
    <div class="facebox-content" role="dialog" aria-labelledby="facebox-header" aria-describedby="facebox-description">
    </div>
    <button type="button" class="facebox-close js-facebox-close" aria-label="Close modal">
      <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
    </button>
  </div>
</div>

  

  </body>
</html>

