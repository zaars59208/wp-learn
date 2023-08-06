<div class="rwmb-tab-panel rwmb-tab-panel-listing_location" data-panel="listing_location" style="display: block;">
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-radio-wrapper">
                <div class="rwmb-label">
                    <label for="homey_show_map">Do you want to show the listing map?</label>

                </div>
                <div class="rwmb-input">
                    <ul class="rwmb-input-list rwmb-collapse rwmb-inline">
                        <li><label><input value="1" type="radio" size="30" class="rwmb-radio" name="homey_show_map"
                                          checked="checked">Show</label></li>
                        <li><label><input value="0" type="radio" size="30" class="rwmb-radio" name="homey_show_map">Hide</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_aptSuit">Apt, Suite (Optional)</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Ex. #123" type="text" id="homey_aptSuit"
                                               class="rwmb-text" name="homey_aptSuit" fdprocessedid="dsor8g"></div>
            </div>
        </div><!-- .rwmb-column -->
        <div class="rwmb-column rwmb-column-6 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_zip">Zip Code</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter your Zip Code" type="text" id="homey_zip"
                                               class="rwmb-text" name="homey_zip" fdprocessedid="2oangf"></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-text-wrapper">
                <div class="rwmb-label">
                    <label for="homey_listing_address">Address</label>

                </div>
                <div class="rwmb-input"><input size="30" placeholder="Enter the listing address" type="text"
                                               id="homey_listing_address" class="rwmb-text ui-autocomplete-input"
                                               name="homey_listing_address" autocomplete="off" fdprocessedid="58aejy">
                    <p id="homey_listing_address-description" class="description">If you do not enter any address, then
                        the map will not show on listing detail page.</p></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
    <div class="rwmb-row">
        <div class="rwmb-column rwmb-column-12 ">
            <div class="rwmb-field rwmb-map-wrapper">
                <div class="rwmb-label">
                    <label for="homey_listing_location">Drag and drop the pin on map to find exact location</label>

                </div>
                <div class="rwmb-input">
                    <div class="rwmb-map-field" data-address-field="homey_listing_address">
                        <div class="rwmb-map-canvas" data-default-loc="28.8136,70.5146,15" data-region=""
                             style="position: relative; overflow: hidden;">
                            <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                <div class="gm-err-container">
                                    <div class="gm-err-content">
                                        <div class="gm-err-icon"><img
                                                    src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png"
                                                    alt="" draggable="false" style="user-select: none;"></div>
                                        <div class="gm-err-title">Oops! Something went wrong.</div>
                                        <div class="gm-err-message">This page didn't load Google Maps correctly. See the
                                            JavaScript console for technical details.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input id="homey_listing_location" class="rwmb-map" name="homey_listing_location" type="hidden"
                               value="28.8136,70.5146,15"></div>
                    <p id="homey_listing_location-description" class="description">Drag and drop the pin on map to find
                        exact location or use address field above.</p></div>
            </div>
        </div><!-- .rwmb-column --></div><!-- .rwmb-row -->
</div>