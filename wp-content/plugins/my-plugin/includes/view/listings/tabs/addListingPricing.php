<div class="rwmb-tab-panel rwmb-tab-panel-listing_price" data-panel="listing_price" style="display: block;">
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-select-wrapper">
                <div class="rwmb-label">
                    <label for="homey_booking_type">Booking Type</label>

                </div>
                <div class="rwmb-input"><select id="homey_booking_type" class="rwmb-select" name="homey_booking_type"
                                                data-selected="both" fdprocessedid="eb02ys">
                        <option value="per_day">Nightly</option>
                        <option value="per_day_date">Daily</option>
                        <option value="per_week">Weekly</option>
                        <option value="per_month">Monthly</option>
                        <option value="per_hour">Hourly</option>
                    </select></div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-checkbox-wrapper">
                <div class="rwmb-label">
                    <label for="homey_instant_booking">Instance booking</label>

                </div>
                <div class="rwmb-input"><label id="homey_instant_booking_description" class="description"><input
                                value="1" type="checkbox" size="30" id="homey_instant_booking" class="rwmb-checkbox"
                                name="homey_instant_booking"> Allow instant booking for this place.</label></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_day_date_price">Price</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter Price" type="text" id="homey_day_date_price"
                                               class="rwmb-text" name="homey_day_date_price"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;=&quot;,&quot;per_day_date&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_night_price">Price</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter Price" type="text" id="homey_night_price"
                                               class="rwmb-text" name="homey_night_price" fdprocessedid="piew6k"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_hour&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_hourly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_hour_price">Price Per Hour</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter price for 1 hour" type="text"
                                               id="homey_hour_price" class="rwmb-text" name="homey_hour_price"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_price_postfix">After Price Label</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter after price label. Eg: Night/Hr" type="text"
                                               id="homey_price_postfix" class="rwmb-text" name="homey_price_postfix"
                                               fdprocessedid="3w19di">
                    <p id="homey_price_postfix-description" class="description">If leave empty, it will use theme
                        options default label.</p></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_hourly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_hourly_weekends_price">Weekend Price</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter per hour price for weekends" type="text"
                                               id="homey_hourly_weekends_price" class="rwmb-text"
                                               name="homey_hourly_weekends_price"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_weekends_price">Weekends</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the unit price for a single day" type="text"
                                               id="homey_weekends_price" class="rwmb-text" name="homey_weekends_price"
                                               fdprocessedid="px55do"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-select-wrapper" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_weekends_days">Select the days to apply weekend pricing</label>

                </div>
                <div class="rwmb-input"><select id="homey_weekends_days" class="rwmb-select" name="homey_weekends_days"
                                                fdprocessedid="e0orfo">
                        <option value="sat_sun">Saturday and Sunday</option>
                        <option value="fri_sat">Friday and Saturday</option>
                        <option value="fri_sat_sun">Friday, Saturday and Sunday</option>
                    </select></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_hour&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-divider-wrapper homey_daily" data-visible="visible"
                 style="visibility: visible;">
                <hr>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-heading-wrapper homey_daily" data-visible="visible"
                 style="visibility: visible;"><h4>Long-term pricing</h4>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_priceWeek">Weekly - 7+ nights</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the unit price for a single day" type="text"
                                               id="homey_priceWeek" class="rwmb-text" name="homey_priceWeek"
                                               fdprocessedid="7m5si"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_priceMonthly">Monthly - 30+ nights</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the unit price for a single day" type="text"
                                               id="homey_priceMonthly" class="rwmb-text" name="homey_priceMonthly"
                                               fdprocessedid="bmjpp8"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-divider-wrapper">
                <hr>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-heading-wrapper"><h4>Additional costs</h4></div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_allow_additional_guests">Allow additional guests</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="yes" type="radio" size="30" class="rwmb-radio"
                                          name="homey_allow_additional_guests">Yes</label></li>
                        <li><label><input value="no" type="radio" size="30" class="rwmb-radio"
                                          name="homey_allow_additional_guests" checked="checked">No</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-3 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_additional_guests_price">Additional guests</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the price for 1 additional guest"
                                               type="text" id="homey_additional_guests_price" class="rwmb-text"
                                               name="homey_additional_guests_price" fdprocessedid="yp264"></div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-3 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_num_additional_guests">No of Guests</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Number of additional guests allowed" type="text"
                                               id="homey_num_additional_guests" class="rwmb-text"
                                               name="homey_num_additional_guests" fdprocessedid="1pvn18"></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_cleaning_fee">Cleaning fee</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the price for cleaning fee" type="text"
                                               id="homey_cleaning_fee" class="rwmb-text" name="homey_cleaning_fee"
                                               fdprocessedid="lzqhao"></div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_cleaning_fee_type">Cleaning fee type</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="daily" type="radio" size="30" class="rwmb-radio"
                                          name="homey_cleaning_fee_type">Daily</label></li>
                        <li><label><input value="per_stay" type="radio" size="30" class="rwmb-radio"
                                          name="homey_cleaning_fee_type" checked="checked">Per stay</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_city_fee">City fee</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the price for city fee" type="text"
                                               id="homey_city_fee" class="rwmb-text" name="homey_city_fee"
                                               fdprocessedid="euvzpt"></div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_city_fee_type">City fee type</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="daily" type="radio" size="30" class="rwmb-radio"
                                          name="homey_city_fee_type">Daily</label></li>
                        <li><label><input value="per_stay" type="radio" size="30" class="rwmb-radio"
                                          name="homey_city_fee_type" checked="checked">Per stay</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_security_deposit">Security deposit</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter price for security deposit" type="text"
                                               id="homey_security_deposit" class="rwmb-text"
                                               name="homey_security_deposit" fdprocessedid="eqk6pd"></div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_tax_rate">Tax %</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter tax percentage (only number)" type="text"
                                               id="homey_tax_rate" class="rwmb-text" name="homey_tax_rate"
                                               fdprocessedid="p4bais"></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row --></div>