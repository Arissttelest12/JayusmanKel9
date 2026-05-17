<!-- ========== MAIN CONTENT ========== -->
<main class="lg:hs-overlay-layout-open:ps-60 transition-all duration-300 lg:fixed lg:inset-0 pt-13.5 px-3 pb-3">
  @include('partials.menu')

  <!-- Content -->
  <div class="h-[calc(100dvh-62px)] lg:h-full overflow-hidden flex flex-col bg-layer border border-layer-line shadow-xs rounded-lg">
    <!-- Header -->
    <div class="py-3 px-4 flex flex-wrap justify-between items-center gap-2 border-b border-card-line">
      <div>
        <h1 class="font-medium text-lg text-foreground">
          Dashboard
        </h1>
      </div>

      <!-- Button Group -->
      <div class="flex items-center gap-x-5">
        <span class="text-sm text-muted-foreground-1">
          Sign up for Pro
        </span>
        <a class="py-1.5 px-2 flex items-center justify-center gap-x-1 bg-primary-500/10 border border-primary-200 text-primary-700 text-xs rounded-full py-1 hover:bg-primary-500/20 focus:outline-hidden focus:bg-primary-500/20" href="#">
          Get 7 days free
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </a>
      </div>
      <!-- End Button Group -->
    </div>
    <!-- End Header -->

    <!-- Body -->
    <div class="flex-1 flex flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
      <div class="flex-1 flex flex-col lg:flex-row">
        <div class="flex-1 min-w-0 flex flex-col border-e border-layer-line">
          <!-- Negative Value Chart in Card -->
          <div class="p-4 flex flex-col border-b border-line-2">
            <!-- Select -->
            <div>
              <div class="relative inline-block">
                <select id="hs-pro-select-revenue" data-hs-select='{
                    "placeholder": "Select option...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative -ms-2.5 py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-sm text-foreground rounded-lg hover:bg-muted-hover focus:outline-hidden focus:bg-muted-focus before:absolute before:inset-0 before:z-1",
                    "dropdownClasses": "mt-2 z-50 w-40 p-1 space-y-0.5 overflow-hidden overflow-y-auto bg-select border border-select-line rounded-xl shadow-xl [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb",
                    "optionClasses": "hs-selected:bg-select-item-active py-1.5 px-2 w-full text-[13px] text-select-item-foreground rounded-lg cursor-pointer hover:bg-select-item-hover rounded-lg focus:outline-hidden focus:bg-select-item-focus",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-foreground\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-2 cursor-pointer -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-foreground\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m6 9 6 6 6-6\"/></svg></div>"
                  }' class="hidden">
                  <option value="">Choose</option>
                  <option selected>Members</option>
                  <option>Posts</option>
                  <option>Views</option>
                </select>
              </div>
            </div>
            <!-- End Select -->

            <!-- Grid -->
            <div class="mt-2 grid grid-cols-2 gap-2">
              <div class="flex flex-col">
                <div class="flex items-center gap-2">
                  <span class="block font-medium text-xl text-foreground">
                    22,900
                  </span>
                  <span class="flex justify-center items-center gap-x-1 text-sm text-green-600">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m5 12 7-7 7 7"></path>
                      <path d="M12 19V5"></path>
                    </svg>
                    0.2%
                  </span>
                </div>
                <div class="flex items-center gap-1.5">
                  <span class="shrink-0 w-3 h-1.5 inline-block bg-chart-primary rounded-xs"></span>
                  <div class="grow">
                    <span class="block text-sm text-muted-foreground-1">
                      Free
                    </span>
                  </div>
                </div>
              </div>
              <!-- End Col -->

              <div class="flex flex-col items-end">
                <div class="flex items-center gap-2">
                  <span class="flex justify-center items-center gap-x-1 text-sm text-green-600">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m5 12 7-7 7 7"></path>
                      <path d="M12 19V5"></path>
                    </svg>
                    14.5%
                  </span>
                  <span class="block font-medium text-xl text-foreground">
                    24,300
                  </span>
                </div>
                <div class="flex items-center gap-1.5">
                  <span class="shrink-0 w-3 h-1.5 inline-block bg-[linear-gradient(135deg,var(--color-chart-3)_25%,transparent_25%,transparent_50%,var(--color-chart-3)_50%,var(--color-chart-3)_75%,transparent_75%,transparent)] bg-[length:4px_4px] rounded-xs"></span>
                  <div class="grow">
                    <span class="block text-sm text-muted-foreground-1">
                      Paid
                    </span>
                  </div>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Grid -->

            <!-- Apex Line Chart -->
            <div id="hs-pro-anvpch" class="min-h-[323px] "></div>
          </div>
          <!-- End Negative Value Chart in Card -->

          <!-- Featured News Blog -->
          <div class="p-4 flex flex-col">
            <!-- Header -->
            <div class="pb-2 flex flex-wrap justify-between items-center gap-2 border-b border-dashed border-line-2">
              <h2 class="font-medium text-foreground">
                Top posts
              </h2>

              <button type="button" class="py-1.5 px-2.5 flex items-center justify-center gap-x-1.5 border border-layer-line text-layer-foreground text-[13px] rounded-lg py-1 hover:bg-primary-50 hover:border-primary-100 hover:text-primary-700 focus:outline-none focus:bg-primary-50 focus:border-primary-100 focus:text-primary-700">
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"></path>
                  <path d="M21 3v5h-5"></path>
                </svg>
                Refresh
              </button>
            </div>
            <!-- End Header -->

            <!-- Featured News Blog -->
            <div class="flex flex-col pb-4 last:pb-0 last:border-b-0">
              <div class="pt-4 flex flex-col md:flex-row gap-5">
                <div class="relative aspect-4/2 md:aspect-4/3 w-full md:max-w-80 bg-secondary rounded-lg">
                  <img class="absolute inset-0 size-full object-cover object-center rounded-lg" src="https://images.unsplash.com/photo-1737625773603-3f0acdb5bb3f?q=80&w=480&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Post Image">
                </div>

                <div class="grow">
                  <div class="h-full flex flex-col">
                    <p class="text-sm text-muted-foreground-1">
                      Post title:
                    </p>
                    <h3 class="font-medium text-foreground">
                      Top posts
                    </h3>

                    <div class="mt-4 grid grid-cols-2 xl:grid-cols-3 gap-y-4 gap-x-2">
                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Position:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978" />
                            <path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978" />
                            <path d="M18 9h1.5a1 1 0 0 0 0-5H18" />
                            <path d="M4 22h16" />
                            <path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z" />
                            <path d="M6 9H4.5a1 1 0 0 1 0-5H6" />
                          </svg>

                          <div class="flex items-center gap-2">
                            <span class="font-medium text-sm text-foreground">
                              #1
                            </span>
                            <span class="flex justify-center items-center gap-x-1 text-sm text-green-600">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 7-7 7 7"></path>
                                <path d="M12 19V5"></path>
                              </svg>
                              11
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Published date:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                            <path d="M3 10h18" />
                            <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            June 19, 2025
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Author:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                            <path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            <circle cx="10" cy="7" r="4" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            John Doe
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Category:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="7" x="3" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="14" rx="1" />
                            <rect width="7" height="7" x="3" y="14" rx="1" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            Travel
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Tags:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z" />
                            <circle cx="7.5" cy="7.5" r=".5" fill="currentColor" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            Adventure, Nature
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Views:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                          </svg>

                          <div class="flex items-center gap-2">
                            <span class="font-medium text-sm text-foreground">
                              2,120
                            </span>
                            <span class="flex justify-center items-center gap-x-1 text-sm text-green-600">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 7-7 7 7"></path>
                                <path d="M12 19V5"></path>
                              </svg>
                              1,399
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End Item -->
                    </div>

                    <!-- Footer -->
                    <div class="mt-4 xl:mt-auto pt-4 border-t border-line-2">
                      <div class="flex flex-wrap justify-between items-center gap-1.5">
                        <div>
                          <a class="inline-flex items-center gap-x-0.5 text-[13px] text-primary underline underline-offset-2 hover:decoration-2 focus:outline-hidden focus:decoration-2 disabled:opacity-50 disabled:pointer-events-none" href="#">
                            View post
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="m9 18 6-6-6-6"></path>
                            </svg>
                          </a>
                        </div>
                        <!-- End Col -->

                        <a class="py-1.5 px-2.5 flex items-center justify-center gap-x-1.5 border border-transparent text-muted-foreground-1 text-[13px] rounded-lg hover:bg-muted-hover hover:text-foreground focus:outline-none focus:bg-muted-focus focus:text-foreground" href="#">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 16v5" />
                            <path d="M16 14v7" />
                            <path d="M20 10v11" />
                            <path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15" />
                            <path d="M4 18v3" />
                            <path d="M8 14v7" />
                          </svg>
                          Metrics
                        </a>
                        <!-- End Col -->
                      </div>
                    </div>
                    <!-- End Footer -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End Featured News Blog -->

            <!-- Featured News Blog -->
            <div class="flex flex-col pb-4 last:pb-0 last:border-b-0">
              <div class="pt-4 flex flex-col md:flex-row gap-5">
                <div class="relative aspect-4/2 md:aspect-4/3 w-full md:max-w-80 bg-secondary rounded-lg">
                  <img class="absolute inset-0 size-full object-cover object-center rounded-lg" src="https://images.unsplash.com/photo-1673767296837-8106e1b94d34?q=80&w=480&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Post Image">
                </div>

                <div class="grow">
                  <div class="h-full flex flex-col">
                    <p class="text-sm text-muted-foreground-1">
                      Post title:
                    </p>
                    <h3 class="font-medium text-foreground">
                      Video marketing best practices
                    </h3>

                    <div class="mt-4 grid grid-cols-2 xl:grid-cols-3 gap-y-4 gap-x-2">
                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Position:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978" />
                            <path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978" />
                            <path d="M18 9h1.5a1 1 0 0 0 0-5H18" />
                            <path d="M4 22h16" />
                            <path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z" />
                            <path d="M6 9H4.5a1 1 0 0 1 0-5H6" />
                          </svg>

                          <div class="flex items-center gap-2">
                            <span class="font-medium text-sm text-foreground">
                              #2
                            </span>
                            <span class="flex justify-center items-center gap-x-1 text-sm text-red-600">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14"></path>
                                <path d="m19 12-7 7-7-7"></path>
                              </svg>
                              1
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Published date:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                            <path d="M3 10h18" />
                            <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            March 11, 2025
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Author:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                            <path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            <circle cx="10" cy="7" r="4" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            Lisa Anderson
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Category:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="7" x="3" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="14" rx="1" />
                            <rect width="7" height="7" x="3" y="14" rx="1" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            Marketing
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Tags:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z" />
                            <circle cx="7.5" cy="7.5" r=".5" fill="currentColor" />
                          </svg>

                          <span class="font-medium text-sm text-foreground">
                            Video, Marketing
                          </span>
                        </div>
                      </div>
                      <!-- End Item -->

                      <!-- Item -->
                      <div class="flex flex-col gap-y-1">
                        <span class="text-[13px] text-muted-foreground-1">
                          Views:
                        </span>

                        <div class="flex items-center gap-x-1.5">
                          <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                          </svg>

                          <div class="flex items-center gap-2">
                            <span class="font-medium text-sm text-foreground">
                              2,001
                            </span>
                            <span class="flex justify-center items-center gap-x-1 text-sm text-green-600">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 7-7 7 7"></path>
                                <path d="M12 19V5"></path>
                              </svg>
                              1
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End Item -->
                    </div>

                    <!-- Footer -->
                    <div class="mt-4 xl:mt-auto pt-4 border-t border-line-2">
                      <div class="flex flex-wrap justify-between items-center gap-1.5">
                        <div>
                          <a class="inline-flex items-center gap-x-0.5 text-[13px] text-primary underline underline-offset-2 hover:decoration-2 focus:outline-hidden focus:decoration-2 disabled:opacity-50 disabled:pointer-events-none" href="#">
                            View post
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="m9 18 6-6-6-6"></path>
                            </svg>
                          </a>
                        </div>
                        <!-- End Col -->

                        <a class="py-1.5 px-2.5 flex items-center justify-center gap-x-1.5 border border-transparent text-muted-foreground-1 text-[13px] rounded-lg hover:bg-muted-hover hover:text-foreground focus:outline-none focus:bg-muted-focus focus:text-foreground" href="#">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 16v5" />
                            <path d="M16 14v7" />
                            <path d="M20 10v11" />
                            <path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15" />
                            <path d="M4 18v3" />
                            <path d="M8 14v7" />
                          </svg>
                          Metrics
                        </a>
                        <!-- End Col -->
                      </div>
                    </div>
                    <!-- End Footer -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End Featured News Blog -->
          </div>
          <!-- End Featured News Blog -->

          <!-- Loading Indicator -->
          <div class="h-16 flex flex-col justify-center items-center text-center">
            <span class="inline-flex gap-x-1">
              <span class="size-1.5 bg-surface-3 animate-[typing_1s_ease-in-out_infinite] rounded-full"></span>
              <span class="size-1.5 bg-surface-3 animate-[typing_1s_ease-in-out_infinite_0.2s] rounded-full"></span>
              <span class="size-1.5 bg-surface-3 animate-[typing_1s_ease-in-out_infinite_0.4s] rounded-full"></span>
            </span>
          </div>
          <!-- End Loading Indicator -->
        </div>
        <!-- End Col -->

        <div class="shrink-0">
          <div class="lg:w-80">
            <!-- Card Group -->
            <div class="relative z-1 ">
              <!-- Heading -->
              <div class="p-4 pb-0">
                <div class="pb-2 flex flex-wrap justify-between items-center gap-2 border-b border-dashed border-line-2">
                  <h2 class="font-medium text-sm text-foreground">
                    Top authors
                  </h2>

                  <!-- Avatar Media -->
                  <button type="button" class="group inline-flex items-center text-[13px] text-start text-muted-foreground-1">
                    <span class="block me-1">
                      Next:
                    </span>
                    <span class="inline-flex items-center text-primary underline-offset-2 decoration-2 group-hover:underline group-hover:text-primary-hover group-focus:underline group-focus:text-primary-focus">
                      Niki Kray
                      <svg class="shrink-0 size-4 ms-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                      </svg>
                    </span>
                  </button>
                  <!-- End Avatar Media -->
                </div>
              </div>
              <!-- End Heading -->

              <!-- Body -->
              <div class="p-4">
                <!-- Profile -->
                <div class="flex items-center gap-x-3">
                  <span class="relative size-14 shrink-0 bg-secondary rounded-full">
                    <img class="absolute inset-0 size-full object-cover rounded-full" src="https://images.unsplash.com/photo-1719937206140-c4b208c78aa7?q=80&w=160&h=160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Post Image">
                  </span>
                  <div class="grow">
                    <h3 class="font-medium text-lg text-foreground">
                      Brian Williams
                    </h3>
                  </div>
                </div>
                <!-- End Profile -->

                <!-- Grid List -->
                <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-2">
                  <!-- Item -->
                  <div class="flex flex-col gap-y-1">
                    <span class="text-[13px] text-muted-foreground-1">
                      Published posts:
                    </span>

                    <div class="flex items-center gap-x-1.5">
                      <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <path d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                      </svg>

                      <span class="font-medium text-sm text-foreground">
                        48
                      </span>
                    </div>
                  </div>
                  <!-- End Item -->

                  <!-- Item -->
                  <div class="flex flex-col gap-y-1">
                    <span class="text-[13px] text-muted-foreground-1">
                      Avg. post views:
                    </span>

                    <div class="flex items-center gap-x-1.5">
                      <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                        <circle cx="12" cy="12" r="3" />
                      </svg>

                      <span class="font-medium text-sm text-foreground">
                        285
                      </span>
                    </div>
                  </div>
                  <!-- End Item -->

                  <!-- Item -->
                  <div class="flex flex-col gap-y-1">
                    <span class="text-[13px] text-muted-foreground-1">
                      Total comments:
                    </span>

                    <div class="flex items-center gap-x-1.5">
                      <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                      </svg>

                      <span class="font-medium text-sm text-foreground">
                        18
                      </span>
                    </div>
                  </div>
                  <!-- End Item -->

                  <!-- Item -->
                  <div class="flex flex-col gap-y-1">
                    <span class="text-[13px] text-muted-foreground-1">
                      Posts referred:
                    </span>

                    <div class="flex items-center gap-x-1.5">
                      <svg class="shrink-0 size-4 text-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                        <path d="m21 3-9 9" />
                        <path d="M15 3h6v6" />
                      </svg>

                      <span class="font-medium text-sm text-foreground">
                        62
                      </span>
                    </div>
                  </div>
                  <!-- End Item -->
                </div>
                <!-- End Grid List -->

                <!-- Card -->
                <div class="pt-5 mt-5 border-t border-line-2">
                  <!-- Header -->
                  <div class="grid grid-cols-2 gap-2">
                    <div class="flex flex-col">
                      <!-- Avatar Group -->
                      <div class="my-3 flex -space-x-3">
                        <img class="shrink-0 size-6 relative z-2 ring-2 ring-layer rounded-full" src="https://images.unsplash.com/photo-1708443683276-8a3eb30faef2?q=80&w=160&h=160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                        <img class="shrink-0 size-6 relative z-1 -mt-3 ring-2 ring-layer rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">
                        <img class="shrink-0 size-6 relative ring-2 ring-layer rounded-full" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">
                      </div>
                      <!-- End Avatar Group -->

                      <h3 class="text-sm text-muted-foreground-1">
                        Total views
                      </h3>

                      <p class="text-xl text-foreground">
                        1,420
                      </p>
                    </div>
                    <!-- End Col -->

                    <!-- Apex Chart -->
                    <div id="hs-pro-atatpvch" class="min-h-22.5"></div>
                  </div>
                  <!-- End Header -->

                  <div class="mt-3">
                    <a class="inline-flex items-center gap-x-0.5 text-[13px] text-primary underline underline-offset-2 hover:decoration-2 focus:outline-hidden focus:decoration-2 disabled:opacity-50 disabled:pointer-events-none" href="#">
                      View all
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                      </svg>
                    </a>
                  </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="pt-5 mt-5 border-t border-line-2">
                  <!-- Progress Content -->
                  <div class="relative flex items-center gap-1">
                    <!-- Circular Progress -->
                    <svg class="shrink-0 size-12" width="64" height="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                      <g transform="translate(32,32)">
                        <g>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(0)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(30)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(60)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(90)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(120)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(150)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(180)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(210)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(240)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(270)" class="text-primary"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(300)" class="text-layer"></rect>
                          <rect x="-3" y="-28" width="6" height="14" rx="3" fill="currentColor" transform="rotate(330)" class="text-layer"></rect>
                        </g>
                      </g>
                    </svg>
                    <!-- End Circular Progress -->

                    <div class="grow pe-20">
                      <div class="flex flex-col">
                        <span class="block text-[13px] text-muted-foreground-1">
                          Content quality score
                        </span>
                        <div class="flex items-center gap-2">
                          <span class="block font-medium text-sm text-foreground">
                            76%
                          </span>
                          <span class="flex justify-center items-center gap-x-1 text-sm text-green-600">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="m5 12 7-7 7 7"></path>
                              <path d="M12 19V5"></path>
                            </svg>
                            3.4%
                          </span>
                        </div>
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="absolute top-1/2 end-0 -translate-y-1/2">
                      <button type="button" class="group size-7 lg:size-auto lg:py-1.5 lg:px-2 flex items-center justify-center border border-layer-line text-layer-foreground text-xs rounded-full py-1 hover:bg-primary-50 hover:border-primary-100 hover:text-primary-700 focus:outline-none focus:bg-primary-50 focus:border-primary-100 focus:text-primary-700">
                        <span class="lg:block hidden max-w-0 overflow-hidden whitespace-nowrap opacity-0 transition-all duration-300 group-hover:me-1 group-hover:max-w-25 group-hover:opacity-100 group-focus:me-1 group-focus:max-w-25 group-focus:opacity-100">
                          View all
                        </span>
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M15 3h6v6" />
                          <path d="m21 3-7 7" />
                          <path d="m3 21 7-7" />
                          <path d="M9 21H3v-6" />
                        </svg>
                      </button>
                    </div>
                    <!-- End Button -->
                  </div>
                  <!-- End Progress Content -->

                  <!-- List Group -->
                  <ul class="mt-5 flex flex-col gap-y-3">
                    <!-- List Item -->
                    <li class="flex justify-between items-center gap-x-2">
                      <div class="flex flex-col gap-y-1">
                        <span class="block text-[13px] text-muted-foreground-1">
                          Title/subject length
                        </span>
                        <span class="block font-medium text-sm text-foreground">
                          50-60
                        </span>
                      </div>
                      <!-- End Col -->

                      <div class="flex flex-col justify-end items-end gap-1">
                        <div class="flex justify-end items-center gap-1">
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                        </div>

                        <p class="text-[13px] text-primary">
                          Good
                        </p>
                      </div>
                      <!-- End Col -->
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="flex justify-between items-center gap-x-2">
                      <div class="flex flex-col gap-y-1">
                        <span class="block text-[13px] text-muted-foreground-1">
                          Body word count
                        </span>
                        <span class="block font-medium text-sm text-foreground">
                          300–800
                        </span>
                      </div>
                      <!-- End Col -->

                      <div class="flex flex-col justify-end items-end gap-1">
                        <div class="flex justify-end items-center gap-1">
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                        </div>

                        <p class="text-[13px] text-primary">
                          Good
                        </p>
                      </div>
                      <!-- End Col -->
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="flex justify-between items-center gap-x-2">
                      <div class="flex flex-col gap-y-1">
                        <span class="block text-[13px] text-muted-foreground-1">
                          Tags/keywords
                        </span>
                        <span class="block font-medium text-sm text-foreground">
                          3-8
                        </span>
                      </div>
                      <!-- End Col -->

                      <div class="flex flex-col justify-end items-end gap-1">
                        <div class="flex justify-end items-center gap-1">
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                        </div>

                        <p class="text-[13px] text-primary">
                          Good
                        </p>
                      </div>
                      <!-- End Col -->
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="flex justify-between items-center gap-x-2">
                      <div class="flex flex-col gap-y-1">
                        <span class="block text-[13px] text-muted-foreground-1">
                          Broken links
                        </span>
                        <span class="block font-medium text-sm text-foreground">
                          2
                        </span>
                      </div>
                      <!-- End Col -->

                      <div class="flex flex-col justify-end items-end gap-1">
                        <div class="flex justify-end items-center gap-1">
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-orange-500 rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-orange-500 rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-surface-2 rounded-full"></span>
                        </div>

                        <p class="text-sm text-orange-500">
                          Poor
                        </p>
                      </div>
                      <!-- End Col -->
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="flex justify-between items-center gap-x-2">
                      <div class="flex flex-col gap-y-1">
                        <span class="block text-[13px] text-muted-foreground-1">
                          Spelling &amp; grammar
                        </span>
                        <span class="block font-medium text-sm text-foreground">
                          100%
                        </span>
                      </div>
                      <!-- End Col -->

                      <div class="flex flex-col justify-end items-end gap-1">
                        <div class="flex justify-end items-center gap-1">
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                          <span class="shrink-0 w-1 h-3.5 inline-block bg-primary rounded-full"></span>
                        </div>

                        <p class="text-[13px] text-primary">
                          Good
                        </p>
                      </div>
                      <!-- End Col -->
                    </li>
                    <!-- End List Item -->
                  </ul>
                  <!-- End List Group -->
                </div>
                <!-- End Card -->
              </div>
              <!-- End Body -->
            </div>
            <!-- End Card Group -->

            <div class="hidden lg:block border-t border-line-2">
              <div class="p-4">
                <!-- Card -->
                <div class="p-4 flex flex-col bg-surface rounded-lg">
                  <h3 class="font-semibold text-sm text-surface-foreground">
                    Connect to your mailboxes
                  </h3>

                  <div class="mt-3">
                    <p class="text-sm text-muted-foreground-1">
                      Connect to your favorite mailbox and recive updates to your inbox.
                    </p>
                  </div>

                  <div class="mt-3 flex flex-wrap justify-between items-center gap-2">
                    <a class="inline-flex items-center gap-x-0.5 text-[13px] text-primary underline underline-offset-2 hover:decoration-2 focus:outline-hidden focus:decoration-2 disabled:opacity-50 disabled:pointer-events-none" href="#">
                      Discover more
                    </a>

                    <!-- Avatar Group -->
                    <div class="flex gap-x-2">
                      <div class="size-7 flex justify-center items-center bg-layer shadow-xs rounded-md">
                        <svg class="shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.34318 0.00012207H24.6569C28.725 0.00012207 32 3.27516 32 7.34327V24.657C32 28.7251 28.725 32.0001 24.6569 32.0001H7.34318C3.27507 32.0001 2.52724e-05 28.7251 2.52724e-05 24.657V7.34327C2.52724e-05 3.27516 3.27507 0.00012207 7.34318 0.00012207Z" fill="url(#paint0_linear_5465_1620)"></path>
                          <path d="M7.01113 9.1001C6.84252 9.1001 6.68368 9.12919 6.53335 9.18899L9.54446 12.289L12.5889 15.4446L12.6445 15.5112L12.8222 15.689L13 15.8779L15.6111 18.5557C15.6546 18.5827 15.7806 18.6994 15.879 18.7486C16.0058 18.812 16.1432 18.8704 16.2849 18.8754C16.4377 18.8809 16.594 18.8371 16.7315 18.7702C16.8345 18.7201 16.8803 18.6483 17 18.5557L20.0222 15.4334L26.0222 9.25566C25.8332 9.15324 25.6239 9.1001 25.4 9.1001H7.01113ZM6.08891 9.47788C5.7678 9.78214 5.56668 10.2395 5.56668 10.7557V20.9334C5.56668 21.3513 5.7009 21.731 5.92224 22.0223L6.34446 21.6223L9.48891 18.5668L12.2778 15.8668L12.2222 15.8001L9.16668 12.6557L6.11113 9.5001L6.08891 9.47788ZM26.4222 9.57788L20.4 15.8001L20.3445 15.8557L23.2445 18.6668L26.3889 21.7223L26.5778 21.9001C26.7471 21.6285 26.8445 21.2938 26.8445 20.9334V10.7557C26.8445 10.2955 26.685 9.87817 26.4222 9.57788ZM12.6333 16.2334L9.85557 18.9334L6.70002 21.989L6.30002 22.3779C6.5109 22.5137 6.75088 22.6001 7.01113 22.6001H25.4C25.7129 22.6001 25.9967 22.4797 26.2334 22.289L26.0334 22.089L22.8778 19.0334L19.9778 16.2334L17.3667 18.9223C17.2254 19.016 17.1309 19.1199 16.9929 19.1837C16.7709 19.2864 16.5275 19.3733 16.2828 19.3696C16.0375 19.3658 15.797 19.2698 15.5768 19.1615C15.4663 19.1072 15.4074 19.0531 15.2778 18.9446L12.6333 16.2334Z" fill="white"></path>
                          <defs>
                            <linearGradient id="paint0_linear_5465_1620" x1="16.2241" y1="31.8717" x2="16.2552" y2="0.386437" gradientUnits="userSpaceOnUse">
                              <stop stop-color="#70EFFF"></stop>
                              <stop offset="1" stop-color="#5770FF"></stop>
                            </linearGradient>
                          </defs>
                        </svg>
                      </div>
                      <div class="size-7 flex justify-center items-center bg-layer shadow-xs rounded-md">
                        <svg class="shrink-0 size-4" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_41)">
                            <path d="M32.2566 16.36C32.2566 15.04 32.1567 14.08 31.9171 13.08H16.9166V19.02H25.7251C25.5454 20.5 24.5866 22.72 22.4494 24.22L22.4294 24.42L27.1633 28.1L27.4828 28.14C30.5189 25.34 32.2566 21.22 32.2566 16.36Z" fill="#4285F4"></path>
                            <path d="M16.9166 32C21.231 32 24.8463 30.58 27.5028 28.12L22.4694 24.2C21.1111 25.14 19.3135 25.8 16.9366 25.8C12.7021 25.8 9.12677 23 7.84844 19.16L7.66867 19.18L2.71513 23L2.65521 23.18C5.2718 28.4 10.6648 32 16.9166 32Z" fill="#34A853"></path>
                            <path d="M7.82845 19.16C7.48889 18.16 7.28915 17.1 7.28915 16C7.28915 14.9 7.48889 13.84 7.80848 12.84V12.62L2.81499 8.73999L2.6552 8.81999C1.55663 10.98 0.937439 13.42 0.937439 16C0.937439 18.58 1.55663 21.02 2.63522 23.18L7.82845 19.16Z" fill="#FBBC05"></path>
                            <path d="M16.9166 6.18C19.9127 6.18 21.9501 7.48 23.0886 8.56L27.6027 4.16C24.8263 1.58 21.231 0 16.9166 0C10.6648 0 5.27181 3.6 2.63525 8.82L7.80851 12.84C9.10681 8.98 12.6821 6.18 16.9166 6.18Z" fill="#EB4335"></path>
                          </g>
                          <defs>
                            <clipPath id="clip0_41">
                              <rect width="32" height="32" fill="white" transform="translate(0.937439)"></rect>
                            </clipPath>
                          </defs>
                        </svg>
                      </div>
                      <div class="size-7 flex justify-center items-center bg-layer shadow-xs rounded-md">
                        <svg class="shrink-0 size-4" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0.04 8C0.04 3.5816 3.6208 0 8.04 0C12.4576 0 16.04 3.5816 16.04 8C16.04 12.4184 12.4576 16 8.04 16C3.6208 16 0.04 12.4184 0.04 8Z" fill="#FC3F1D"></path>
                          <path d="M9.064 4.5328H8.3248C6.9696 4.5328 6.2568 5.2192 6.2568 6.2312C6.2568 7.3752 6.7496 7.9112 7.7616 8.5984L8.5976 9.1616L6.1952 12.7512H4.4L6.556 9.54C5.316 8.6512 4.62 7.788 4.62 6.328C4.62 4.4976 5.896 3.248 8.316 3.248H10.7184V12.7424H9.064V4.5328Z" fill="white"></path>
                        </svg>
                      </div>
                    </div>
                    <!-- End Avatar Group -->
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Col -->
      </div>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->