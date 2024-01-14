<x-admin.layouts.app :title="$page_title">

    <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <nav>

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link nav-item active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Site</button>
                            <button class="nav-link nav-item" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Contact Info</button>
                            <button class="nav-link nav-item" id="nav-about-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about"
                                aria-selected="false">Social Media</button>
                            <button class="nav-link nav-item" id="nav-credential-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-credential" type="button" role="tab"
                                aria-controls="nav-credential" aria-selected="false">All App Credentials</button>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-homr-tab">
                            <div class="container p-4">
                                <form action="{{ route('admin.setting.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Site Title<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="site_title" type="text" class="form-control p-3"
                                                        placeholder="Enter  Site Title"
                                                        value="{{ config('settings.site_title') ?? old('site_title') }}">
                                                    @error('site_title')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Category Name Set<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="category_name" type="text" class="form-control p-3"
                                                        placeholder="Enter category name"
                                                        value="{{ config('settings.category_name') ?? old('category_name') }}">
                                                    @error('category_name')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Event Day</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="event_day" id=""
                                                        class="form-control p-3 form-select">
                                                        @foreach ($envet_days as $day)
                                                            <option value="{{ $day->name }}"
                                                                @if ($day->name == config('settings.event_day')) @selected(true) @endif>
                                                                {{ $day->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('site_title')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Points for Each Coupon</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="points" type="number" class="form-control p-3"
                                                        placeholder="Enter points 10.00"
                                                        value="{{ config('settings.points') ?? old('points') }}">
                                                    @error('points')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Footer Description<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <textarea name="footer_description" id="" class="form-control p-3" rows="5">{!! config('settings.footer_description') ?? '' !!}</textarea>
                                                    @error('footer_description')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Copy Right Text<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="copy_right" type="text" class="form-control p-3"
                                                        placeholder="Enter Copy Right Text"
                                                        value="{{ config('settings.copy_right') ?? old('copy_right') }}">
                                                    @error('copy_right')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Meta Keyword<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="meta_keyword" type="text" 3
                                                        class="form-control p-2" placeholder="Enter Meta Keyword"
                                                        value="{{ config('settings.meta_keyword') ?? old('meta_keyword') }}">
                                                    @error('meta_keyword')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Meta Title<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="meta_title" type="text" class="form-control p-3"
                                                        placeholder="Enter Meta Title"
                                                        value="{{ config('settings.meta_title') ?? old('meta_title') }}">
                                                    @error('meta_title')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Meta Description<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="meta_description" type="text"
                                                        class="form-control p-3" placeholder="Enter Meta Description"
                                                        value="{{ config('settings.meta_description') ?? old('meta_description') }}">
                                                    @error('meta_description')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2">

                                                </div>
                                                <div class="col-10">

                                                    <button class="btn btn-primary waves-effect waves-lightml-2 mr-2"
                                                        type="submit">
                                                        <i class="fa fa-save"></i>
                                                        Save

                                                    </button>
                                                    <a class="btn btn-secondary waves-effect"
                                                        href="{{ route('admin.setting.index') }}">
                                                        <i class="fa fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="container p-4">
                                <form action="{{ route('admin.setting.store') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Email<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="email" type="email" class="form-control p-3"
                                                        placeholder="Enter Contact Email"
                                                        value="{{ config('settings.email') ?? old('email') }}">
                                                    @error('email')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Phone<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="phone" type="text" class="form-control p-3"
                                                        placeholder="Enter Contact Phone"
                                                        value="{{ config('settings.phone') ?? old('phone') }}">
                                                    @error('phone')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Address<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <textarea name="address" type="text" class="form-control p-3" placeholder="Enter Address">{{ config('settings.address') ?? old('address') }}</textarea>

                                                    @error('address')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2">

                                                </div>
                                                <div class="col-10">

                                                    <button class="btn btn-primary waves-effect waves-lightml-2 mr-2"
                                                        type="submit">
                                                        <i class="fa fa-save"></i>
                                                        Save

                                                    </button>
                                                    <a class="btn btn-secondary waves-effect"
                                                        href="{{ route('admin.setting.index') }}">
                                                        <i class="fa fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                            <div class="container p-4">
                                <form action="{{ route('admin.setting.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Facebook<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="facebook" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Facebook Link"
                                                            value="{{ config('settings.facebook') ?? old('facebook') }}">
                                                        @error('facebook')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Twitter<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="twitter" type="text" class="form-control p-3"
                                                            placeholder="Enter Your twitter Link"
                                                            value="{{ config('settings.twitter') ?? old('twitter') }}">
                                                        @error('twitter')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Instagram<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="instagram" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Instagram Link"
                                                            value="{{ config('settings.instagram') ?? old('instagram') }}">
                                                        @error('instagram')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Linkedin<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="linkedin" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your linkedin Link"
                                                            value="{{ config('settings.linkedin') ?? old('linkedin') }}">
                                                        @error('linkedin')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2">

                                                </div>
                                                <div class="col-10">

                                                    <button class="btn btn-primary waves-effect waves-lightml-2 mr-2"
                                                        type="submit">
                                                        <i class="fa fa-save"></i>
                                                        Save

                                                    </button>
                                                    <a class="btn btn-secondary waves-effect"
                                                        href="{{ route('admin.setting.index') }}">
                                                        <i class="fa fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-credential" role="tabpanel"
                            aria-labelledby="nav-credential-tab">
                            <div class="container p-4">
                                <form action="{{ route('admin.setting.store') }}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Paypal Base Url<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="paypal_baseUri" type="text"
                                                            class="form-control p-3" placeholder="Enter Your Base Url"
                                                            value="{{ config('settings.paypal_baseUri') ?? old('paypal_baseUri') }}">
                                                        @error('paypal_baseUri')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Stripe Client Id<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="stripe_client_id" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Id"
                                                            value="{{ config('settings.stripe_client_id') ?? old('stripe_client_id') }}">
                                                        @error('stripe_client_id')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Stripe client Secret<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="stripe_client_secret" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Secret"
                                                            value="{{ config('settings.stripe_client_secret') ?? old('stripe_client_secret') }}">
                                                        @error('stripe_client_secret')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Paypal Client Id<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="paypal_client_id" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Id"
                                                            value="{{ config('settings.paypal_client_id') ?? old('paypal_client_id') }}">
                                                        @error('paypal_client_id')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Paypal client Secret<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="paypal_client_secret" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Secret"
                                                            value="{{ config('settings.paypal_client_secret') ?? old('paypal_client_secret') }}">
                                                        @error('paypal_client_secret')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Google client Id<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="google_client_id" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Id"
                                                            value="{{ config('settings.google_client_id') ?? old('google_client_id') }}">
                                                        @error('google_client_id')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Google client Secret<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="google_client_secret" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Secret"
                                                            value="{{ config('settings.google_client_secret') ?? old('google_client_secret') }}">
                                                        @error('google_client_secret')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Google Redirect URL<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="google_redirect" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your redirect url"
                                                            value="{{ config('settings.google_redirect') ?? old('google_redirect') }}">
                                                        @error('google_redirect')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Facebook client Id<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="facebook_client_id" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Id"
                                                            value="{{ config('settings.facebook_client_id') ?? old('facebook_client_id') }}">
                                                        @error('facebook_client_id')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Facebook client Secret<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="facebook_client_secret" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your Client Secret"
                                                            value="{{ config('settings.facebook_client_secret') ?? old('facebook_client_secret') }}">
                                                        @error('facebook_client_secret')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Facebook Redirect URL<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="facebook_redirect" type="text"
                                                            class="form-control p-3"
                                                            placeholder="Enter Your redirect url"
                                                            value="{{ config('settings.facebook_redirect') ?? old('facebook_redirect') }}">
                                                        @error('facebook_redirect')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Coupon Api Key<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="coupon_api_key" type="text"
                                                            class="form-control p-3" placeholder="Enter your api key"
                                                            value="{{ config('settings.coupon_api_key') ?? old('coupon_api_key') }}">
                                                        @error('coupon_api_key')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Google Ads Js <span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <input name="google_ads_js" type="text"
                                                            class="form-control p-3" placeholder="Enter your api key"
                                                            value="{{ config('settings.google_ads_js') ?? old('google_ads_js') }}">
                                                        @error('google_ads_js')
                                                            <p class="error">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2">

                                                </div>
                                                <div class="col-10">

                                                    <button class="btn btn-primary waves-effect waves-lightml-2 me-2"
                                                        type="submit">
                                                        <i class="fa fa-save"></i>
                                                        Save

                                                    </button>
                                                    <a class="btn btn-secondary waves-effect"
                                                        href="{{ route('admin.setting.index') }}">
                                                        <i class="fa fa-times"></i>Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="container p-4">
                                <form action="{{ route('admin.setting.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Favicon<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10 mt-2">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfm" data-input="thumbnail"
                                                                data-preview="holder" class="btn btn-primary">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                            </a>
                                                        </span>
                                                        <input id="thumbnail" class="form-control p-3"
                                                            value="{{ config('settings.favicon_icon') ?? ' ' }}"
                                                            type="text" name="favicon_icon">
                                                    </div>

                                                    <div id="holder" style="margin-top:15px;max-height:100px;">
                                                        <img src="{{ asset('/storage') }}/{{ config('settings.favicon_icon') }}"
                                                            alt="Site Logo" style="height:5rem;">
                                                    </div>
                                                    @error('favicon_icon')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2 mt-1">
                                                    <label class="form-label">Site Main Logo<span
                                                            class="error">*</span></label>
                                                </div>
                                                <div class="col-10 mt-2">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfm1" data-input="thumbnail1"
                                                                data-preview="holder1" class="btn btn-primary">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                            </a>
                                                        </span>
                                                        <input id="thumbnail1" class="form-control p-3"
                                                            value="{{ config('settings.main_logo') ?? ' ' }}"
                                                            type="text" name="main_logo">
                                                    </div>

                                                    <div id="holder1" style="margin-top:15px;max-height:100px;">
                                                        <img src="{{ asset('/storage') }}/{{ config('settings.main_logo') }}"
                                                            alt="Site Logo" style="height:5rem;">
                                                    </div>
                                                    @error('main_logo')
                                                        <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-2">

                                                </div>
                                                <div class="col-10">

                                                    <button class="btn btn-primary waves-effect waves-lightml-2 mr-2"
                                                        type="submit">
                                                        <i class="fa fa-save"></i>
                                                        Save

                                                    </button>
                                                    <a class="btn btn-secondary waves-effect"
                                                        href="{{ route('admin.setting.index') }}">
                                                        <i class="fa fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <x-slot name="bottomStyle">
        <style>
            nav>.nav.nav-tabs {

                border: none;
                color: #fff;
                background: #272e38;
                border-radius: 0;

            }

            nav>div button.nav-item.nav-link,
            nav>div button.nav-item.nav-link.active {
                border: none;
                padding: 18px 25px;
                color: #fff;
                background: #272e38;
                border-radius: 0;
            }

            nav>div button.nav-item.nav-link.active:after {
                content: "";
                position: relative;
                bottom: -60px;
                left: -10%;
                border: 15px solid transparent;
                border-top-color: #e74c3c;
            }

            .tab-content {
                background: #fdfdfd;
                line-height: 25px;
                border: 1px solid #ddd;
                border-top: 5px solid #e74c3c;
                border-bottom: 5px solid #e74c3c;
                padding: 30px 25px;
            }

            nav>div button.nav-item.nav-link:hover,
            nav>div button.nav-item.nav-link:focus {
                border: none;
                background: #e74c3c;
                color: #fff;
                border-radius: 0;
                transition: background 0.20s linear;
            }
        </style>
    </x-slot>
    <x-slot name="bottomScript">
        <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button-client.js') }}"></script>
        <script>
            $('#lfm').filemanager('image');
            $('#lfm1').filemanager('image');
            $('#lfm2').filemanager('image');
            $('#lfm20').filemanager('image');
            $('#lfm3').filemanager('image');
            $('#lfm11').filemanager('image');
            $('#lfm12').filemanager('image');
            $('#lfm13').filemanager('image');
            $('#lfm14').filemanager('image');
            $('#lfm15').filemanager('image');
            $('#lfm16').filemanager('image');
            $('#lfm18').filemanager('image');
            $('#lfm19').filemanager('image');
            $('#lfm20').filemanager('image');
        </script>
    </x-slot>
</x-admin.layouts.app>
<!-- internal js -->
