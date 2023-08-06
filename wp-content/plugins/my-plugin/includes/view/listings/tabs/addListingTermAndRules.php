<div class="rwmb-tab-panel rwmb-tab-panel-listing_terms_rules" data-panel="listing_terms_rules" style="display: block;">
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-select-wrapper">
                <div class="rwmb-label">
                    <label for="homey_cancellation_policy">Cancellation Policy</label>

                </div>
                <div class="rwmb-input"><select id="homey_cancellation_policy" class="rwmb-select"
                                                name="homey_cancellation_policy">
                        <option value="">Enter your cancellation policy</option>
                    </select></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_min_book_days">Minimum days of a booking</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the minimum days of a booking (Only number)"
                                               type="text" id="homey_min_book_days" class="rwmb-text"
                                               name="homey_min_book_days"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_max_book_days">Maximum days of a booking</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the maximum days of booking (Only number)"
                                               type="text" id="homey_max_book_days" class="rwmb-text"
                                               name="homey_max_book_days"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_weekly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_min_book_weeks">Minimum number of weeks</label>

                </div>
                <div class="rwmb-input"><input size="30"
                                               placeholder="Enter the minimum weeks of a booking (Only number)"
                                               type="text" id="homey_min_book_weeks" class="rwmb-text"
                                               name="homey_min_book_weeks"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_week&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_weekly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_max_book_weeks">Maximum number of weeks</label>

                </div>
                <div class="rwmb-input"><input size="30"
                                               placeholder="Enter the maximum weeks of a booking (Only number)"
                                               type="text" id="homey_max_book_weeks" class="rwmb-text"
                                               name="homey_max_book_weeks"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_week&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_monthly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_min_book_months">Minimum number of months</label>

                </div>
                <div class="rwmb-input"><input size="30"
                                               placeholder="Enter the minimum months of a booking (Only number)"
                                               type="text" id="homey_min_book_months" class="rwmb-text"
                                               name="homey_min_book_months"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_month&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper homey_monthly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_max_book_months">Maximum number of months</label>

                </div>
                <div class="rwmb-input"><input size="30"
                                               placeholder="Enter the maximum months of a booking (Only number)"
                                               type="text" id="homey_max_book_months" class="rwmb-text"
                                               name="homey_max_book_months"></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_month&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-text-wrapper homey_hourly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_min_book_hours">Minimum hours of a booking</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the minimum hours of a booking" type="text"
                                               id="homey_min_book_hours" class="rwmb-text" name="homey_min_book_hours">
                </div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-divider-wrapper homey_hourly" data-visible="hidden"
                 style="display: none; visibility: hidden;">
                <hr>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-heading-wrapper homey_hourly" data-visible="hidden"
                 style="display: none; visibility: hidden;"><h4>Business Hours</h4>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-select_advanced-wrapper homey_hourly rwmb-select-advanced-dark"
                 data-visible="hidden" style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_start_hour">Start Hour</label>

                </div>
                <div class="rwmb-input"><select
                            data-options="{&quot;allowClear&quot;:true,&quot;width&quot;:&quot;none&quot;,&quot;placeholder&quot;:&quot;Select&quot;}"
                            id="homey_start_hour" class="rwmb-select_advanced select2-hidden-accessible"
                            name="homey_start_hour" data-select2-id="homey_start_hour" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="2">Select</option>
                        <option value="01:00">1:00 am</option>
                        <option value="01:30">1:30 am</option>
                        <option value="02:00">2:00 am</option>
                        <option value="02:30">2:30 am</option>
                        <option value="03:00">3:00 am</option>
                        <option value="03:30">3:30 am</option>
                        <option value="04:00">4:00 am</option>
                        <option value="04:30">4:30 am</option>
                        <option value="05:00">5:00 am</option>
                        <option value="05:30">5:30 am</option>
                        <option value="06:00">6:00 am</option>
                        <option value="06:30">6:30 am</option>
                        <option value="07:00">7:00 am</option>
                        <option value="07:30">7:30 am</option>
                        <option value="08:00">8:00 am</option>
                        <option value="08:30">8:30 am</option>
                        <option value="09:00">9:00 am</option>
                        <option value="09:30">9:30 am</option>
                        <option value="10:00">10:00 am</option>
                        <option value="10:30">10:30 am</option>
                        <option value="11:00">11:00 am</option>
                        <option value="11:30">11:30 am</option>
                        <option value="12:00">12:00 pm</option>
                        <option value="12:30">12:30 pm</option>
                        <option value="13:00">1:00 pm</option>
                        <option value="13:30">1:30 pm</option>
                        <option value="14:00">2:00 pm</option>
                        <option value="14:30">2:30 pm</option>
                        <option value="15:00">3:00 pm</option>
                        <option value="15:30">3:30 pm</option>
                        <option value="16:00">4:00 pm</option>
                        <option value="16:30">4:30 pm</option>
                        <option value="17:00">5:00 pm</option>
                        <option value="17:30">5:30 pm</option>
                        <option value="18:00">6:00 pm</option>
                        <option value="18:30">6:30 pm</option>
                        <option value="19:00">7:00 pm</option>
                        <option value="19:30">7:30 pm</option>
                        <option value="20:00">8:00 pm</option>
                        <option value="20:30">8:30 pm</option>
                        <option value="21:00">9:00 pm</option>
                        <option value="21:30">9:30 pm</option>
                        <option value="22:00">10:00 pm</option>
                        <option value="22:30">10:30 pm</option>
                        <option value="23:00">11:00 pm</option>
                        <option value="23:30">11:30 pm</option>
                        <option value="00:00">12:00 am</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                   data-select2-id="1"><span class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox"
                                    aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-homey_start_hour-container"><span
                                        class="select2-selection__rendered" id="select2-homey_start_hour-container"
                                        role="textbox" aria-readonly="true"><span
                                            class="select2-selection__placeholder">Select</span></span><span
                                        class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-select_advanced-wrapper homey_hourly rwmb-select-advanced-dark"
                 data-visible="hidden" style="display: none; visibility: hidden;">
                <div class="rwmb-label">
                    <label for="homey_end_hour">End Hour</label>

                </div>
                <div class="rwmb-input"><select
                            data-options="{&quot;allowClear&quot;:true,&quot;width&quot;:&quot;none&quot;,&quot;placeholder&quot;:&quot;Select&quot;}"
                            id="homey_end_hour" class="rwmb-select_advanced select2-hidden-accessible"
                            name="homey_end_hour" data-select2-id="homey_end_hour" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="4">Select</option>
                        <option value="01:00">1:00 am</option>
                        <option value="01:30">1:30 am</option>
                        <option value="02:00">2:00 am</option>
                        <option value="02:30">2:30 am</option>
                        <option value="03:00">3:00 am</option>
                        <option value="03:30">3:30 am</option>
                        <option value="04:00">4:00 am</option>
                        <option value="04:30">4:30 am</option>
                        <option value="05:00">5:00 am</option>
                        <option value="05:30">5:30 am</option>
                        <option value="06:00">6:00 am</option>
                        <option value="06:30">6:30 am</option>
                        <option value="07:00">7:00 am</option>
                        <option value="07:30">7:30 am</option>
                        <option value="08:00">8:00 am</option>
                        <option value="08:30">8:30 am</option>
                        <option value="09:00">9:00 am</option>
                        <option value="09:30">9:30 am</option>
                        <option value="10:00">10:00 am</option>
                        <option value="10:30">10:30 am</option>
                        <option value="11:00">11:00 am</option>
                        <option value="11:30">11:30 am</option>
                        <option value="12:00">12:00 pm</option>
                        <option value="12:30">12:30 pm</option>
                        <option value="13:00">1:00 pm</option>
                        <option value="13:30">1:30 pm</option>
                        <option value="14:00">2:00 pm</option>
                        <option value="14:30">2:30 pm</option>
                        <option value="15:00">3:00 pm</option>
                        <option value="15:30">3:30 pm</option>
                        <option value="16:00">4:00 pm</option>
                        <option value="16:30">4:30 pm</option>
                        <option value="17:00">5:00 pm</option>
                        <option value="17:30">5:30 pm</option>
                        <option value="18:00">6:00 pm</option>
                        <option value="18:30">6:30 pm</option>
                        <option value="19:00">7:00 pm</option>
                        <option value="19:30">7:30 pm</option>
                        <option value="20:00">8:00 pm</option>
                        <option value="20:30">8:30 pm</option>
                        <option value="21:00">9:00 pm</option>
                        <option value="21:30">9:30 pm</option>
                        <option value="22:00">10:00 pm</option>
                        <option value="22:30">10:30 pm</option>
                        <option value="23:00">11:00 pm</option>
                        <option value="23:30">11:30 pm</option>
                        <option value="00:00">12:00 am</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                   data-select2-id="3"><span class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox"
                                    aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-homey_end_hour-container"><span
                                        class="select2-selection__rendered" id="select2-homey_end_hour-container"
                                        role="textbox" aria-readonly="true"><span
                                            class="select2-selection__placeholder">Select</span></span><span
                                        class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;hidden&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;!=&quot;,&quot;per_hour&quot;]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-select-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_checkin_after">Check-in After</label>

                </div>
                <div class="rwmb-input"><select id="homey_checkin_after" class="rwmb-select" name="homey_checkin_after">
                        <option value="">Select</option>
                        <option value="" selected="selected">Select</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="7:30 PM">7:30 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="8:30 PM">8:30 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                    </select></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-select-wrapper homey_daily" data-visible="visible" style="visibility: visible;">
                <div class="rwmb-label">
                    <label for="homey_checkout_before">Check-out Before</label>

                </div>
                <div class="rwmb-input"><select id="homey_checkout_before" class="rwmb-select"
                                                name="homey_checkout_before">
                        <option value="">Select</option>
                        <option value="" selected="selected">Select</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="7:30 PM">7:30 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="8:30 PM">8:30 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                    </select></div>
                <script type="html/template" class="rwmb-conditions"
                        data-conditions="{&quot;visible&quot;:{&quot;when&quot;:[[&quot;homey_booking_type&quot;,&quot;in&quot;,[&quot;per_day&quot;,&quot;per_day_date&quot;]]],&quot;relation&quot;:&quot;and&quot;}}"></script>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_smoke">Smoking allowed</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="1" type="radio" size="30" class="rwmb-radio"
                                          name="homey_smoke">Yes</label></li>
                        <li><label><input value="0" type="radio" size="30" class="rwmb-radio" name="homey_smoke"
                                          checked="checked">No</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_pets">Pets allowed</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="1" type="radio" size="30" class="rwmb-radio" name="homey_pets"
                                          checked="checked">Yes</label></li>
                        <li><label><input value="0" type="radio" size="30" class="rwmb-radio"
                                          name="homey_pets">No</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_party">Party allowed</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="1" type="radio" size="30" class="rwmb-radio"
                                          name="homey_party">Yes</label></li>
                        <li><label><input value="0" type="radio" size="30" class="rwmb-radio" name="homey_party"
                                          checked="checked">No</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_children">Children allowed</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="1" type="radio" size="30" class="rwmb-radio" name="homey_children"
                                          checked="checked">Yes</label></li>
                        <li><label><input value="0" type="radio" size="30" class="rwmb-radio"
                                          name="homey_children">No</label></li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-textarea-wrapper">
                <div class="rwmb-label">
                    <label for="homey_additional_rules">Additional rules information (Optional)</label>

                </div>
                <div class="rwmb-input"><textarea cols="60" rows="3" id="homey_additional_rules"
                                                  class="rwmb-textarea large-text"
                                                  name="homey_additional_rules"></textarea></div>
            </div>
        </div><!-- .rwmb-column -->
    </div><!-- .rwmb-row -->
</div>