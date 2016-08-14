<!-- BEGIN USER LAYER -->
<div class="user-layer">
    <input type="hidden" name="path_root" id="path_root" value="{$base_url}">
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="active" onclick="setDriver();"><a href="#messages" data-toggle="tab">Driver</a></li>
       {* <li onclick="setUser();"><a href="#notifications" data-toggle="tab">User</a></li>*}
            {* <li><a href="#notifications" data-toggle="tab">Notifications <span class="badge">3</span></a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>*}
    </ul>
    <input type="hidden" id="active_tab_value" value="driver" >
    <input type="hidden" id="driver_chat_id" value="0" >
    <input type="hidden" id="passenger_chat_id" value="0" >
    <div class="row no-gutters tab-content">

        <div class="tab-pane fade in active" id="messages">
            <div class="col-md-4">
                <div class="message-list-overlay"></div>

                <ul class="list-material message-list">
                    {foreach from = $drivers_msg_list  item=v}
                        <li class="has-action-left has-action-right">
                            <a href="#" class="visible" data-message-id="{$v.user_id}" >
                                <div class="list-action-left">
                                    <img src="{$image_path}faces/{$v.profile_pic}" class="face-radius" alt="">
                                </div>
                                <div class="list-content">
                                    <span class="title">{$v.first_name} {$v.last_name}</span>
                                    <span class="caption"></span>
                                </div>
                                <div class="list-action-right">
                                    <span class="top"></span>
                                    <i class="ion-android-done bottom"></i>
                                </div>
                            </a>

                        </li>
                    {/foreach}
                </ul>
            </div><!--.col-->
            <div class="col-md-8">
                <div class="message-send-container">

                    <div class="messages" id="message-send-container">
                        {*<div class="message left">
                        <div class="message-text">Hello!</div>
                        <img src="{$image_path}faces/1.jpg" class="user-picture" alt="">
                        </div>
                        <div class="message right">
                        <div class="message-text">Hi!</div>
                        <div class="message-text">Credibly innovate granular internal or "organic" sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences.</div>
                        <img src="{$image_path}ajoul.gif" class="user-picture" alt="">
                        </div>*}
                    </div><!--.messages-->

                    <div class="send-message">
                        <div class="input-group">
                            <div class="inputer inputer-blue">
                                <div class="input-wrapper">
                                    <textarea rows="1" id="send-message-input" class="form-control js-auto-size" placeholder="Message" ></textarea>
                                </div>
                            </div><!--.inputer-->
                            <span class="input-group-btn">
                                <button id="send-message-button" class="btn btn-blue" type="submit" value="send" >Send</button>
                            </span>
                        </div>
                    </div><!--.send-message-->
                    <input type="hidden" id="currend_reciver_id" value="" >
                </div><!--.message-send-container-->
            </div><!--.col-->

            <div class="mobile-back">
                <div class="mobile-back-button"><i class="ion-android-arrow-back"></i></div>
            </div><!--.mobile-back-->
        </div><!--.tab-pane #messages-->

        <div class="tab-pane fade" id="notifications">

            <div class="col-md-4">
                <div class="message-list-overlay"></div>

                <ul class="list-material message-list">
                    {foreach from = $passenger_msg_list  item=v}
                        <li class="has-action-left has-action-right">
                            <a href="#" class="visible" data-message-id="{$v.user_id}" >
                                <div class="list-action-left">
                                    <img src="{$image_path}faces/passenger/{$v.profile_pic}" class="face-radius" alt="">
                                </div>
                                <div class="list-content">
                                    <span class="title">{$v.fullname}</span>
                                    <span class="caption"></span>
                                </div>
                                <div class="list-action-right">
                                    <span class="top"></span>
                                    <i class="ion-android-done bottom"></i>
                                </div>
                            </a>

                        </li>
                    {/foreach}
                </ul>
            </div><!--.col-->
            <div class="col-md-8">
                <div class="message-send-container-2">

                    <div class="messages" id="message-send-container">

                    </div><!--.messages-->

                    <div class="send-message">
                        <div class="input-group">
                            <div class="inputer inputer-blue">
                                <div class="input-wrapper">
                                    <textarea rows="1" id="send-message-input-2" class="form-control js-auto-size" placeholder="Message" ></textarea>
                                </div>
                            </div><!--.inputer-->
                            <span class="input-group-btn">
                                <button id="send-message-button-2" class="btn btn-blue" type="submit" value="send" >Send</button>
                            </span>
                        </div>
                    </div><!--.send-message-->
                    <input type="hidden" id="currend_passenger_reciver_id" value="" >
                </div><!--.message-send-container-->
            </div><!--.col-->

            <div class="mobile-back">
                <div class="mobile-back-button"><i class="ion-android-arrow-back"></i></div>
            </div><!--.mobile-back-->
        </div><!--.tab-pane #notifications-->

        {*
        <div class="tab-pane fade" id="notifications">

        <div class="col-md-6 col-md-offset-3">

        <ul class="list-material has-hidden">
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <i class="ion-bag icon text-indigo"></i>
        </div>
        <div class="list-content">
        <span class="caption">Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.</span>
        </div>
        <div class="list-action-right">
        <span class="top">2 hr</span>
        <i class="ion-record text-green bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <i class="ion-image text-green icon"></i>
        </div>
        <div class="list-content">
        <span class="caption">Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value.</span>
        </div>
        <div class="list-action-right">
        <span class="top">16:55</span>
        <i class="ion-record text-green bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <img src="{$image_path}/faces/13.jpg" class="face-radius" alt="">
        </div>
        <div class="list-content">
        <span class="caption">Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</span>
        </div>
        <div class="list-action-right">
        <span class="top">Yesterday</span>
        <i class="ion-record text-green bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <img src="{$image_path}/faces/14.jpg" class="face-radius" alt="">
        </div>
        <div class="list-content">
        <span class="caption">Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.</span>
        </div>
        <div class="list-action-right">
        <span class="top">2 days ago</span>
        <i class="ion-android-done bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <i class="ion-location text-light-blue icon"></i>
        </div>
        <div class="list-content">
        <span class="caption">Dynamically innovate resource-leveling customer service for state of the art customer service. Objectively innovate empowered manufactured products whereas parallel platforms.</span>
        </div>
        <div class="list-action-right">
        <span class="top">1 week ago</span>
        <i class="ion-android-done bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <i class="ion-bookmark text-deep-orange icon"></i>
        </div>
        <div class="list-content">
        <span class="caption">Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables.</span>
        </div>
        <div class="list-action-right">
        <span class="top">10 Jan</span>
        <i class="ion-android-done bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <i class="ion-locked icon"></i>
        </div>
        <div class="list-content">
        <span class="caption">Phosfluorescently engage worldwide methodologies with web-enabled technology.</span>
        </div>
        <div class="list-action-right">
        <span class="top">9 Jan</span>
        <i class="ion-android-done bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <img src="{$image_path}/faces/17.jpg" class="face-radius" alt="">
        </div>
        <div class="list-content">
        <span class="caption">Synergistically evolve 2.0 technologies rather than just in time initiatives. Quickly deploy strategic networks with compelling e-business. Credibly pontificate highly efficient manufactured products and enabled data.</span>
        </div>
        <div class="list-action-right">
        <span class="top">7 Jan</span>
        <i class="ion-android-done bottom"></i>
        </div>
        </a>
        </li>
        <li class="has-action-left has-action-right has-long-story">
        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
        <a href="#" class="visible">
        <div class="list-action-left">
        <i class="ion-navigate text-indigo icon"></i>
        </div>
        <div class="list-content">
        <span class="caption">Objectively pursue diverse catalysts for change for interoperable meta-services. Dramatically mesh low-risk high-yield alignments before transparent e-tailers.</span>
        </div>
        <div class="list-action-right">
        <span class="top">7 Jan</span>
        <i class="ion-android-done bottom"></i>
        </div>
        </a>
        </li>
        </ul>

        </div><!--.col-->
        </div><!--.tab-pane #notifications-->
       

        <div class="tab-pane fade" id="settings">
        <div class="col-md-6 col-md-offset-3">

        <div class="settings-panel">
        <p class="text-grey">Here's where you can check your settings of Pleasure Admin Panel. If you need an extra information from us, do not hesitate to contact.</p>

        <div class="legend">Privacy Controls</div>
        <ul>
        <li>
        Show my profile on search results
        <div class="switcher switcher-indigo pull-right">
        <input id="settings1" type="checkbox" hidden="hidden" checked="checked">
        <label for="settings1"></label>
        </div><!--.switcher-->
        </li>
        <li>
        Only God can judge me
        <div class="switcher switcher-indigo pull-right">
        <input id="settings2" type="checkbox" hidden="hidden" checked="checked">
        <label for="settings2"></label>
        </div><!--.switcher-->
        </li>
        <li>
        Review tags people add to your own posts
        <div class="switcher switcher-indigo pull-right">
        <input id="settings3" type="checkbox" hidden="hidden">
        <label for="settings3"></label>
        </div><!--.switcher-->
        </li>
        </ul>

        <div class="legend">Notifications</div>
        <ul>
        <li>
        Activity that involves you
        <div class="switcher switcher-indigo pull-right">
        <input id="settings4" type="checkbox" hidden="hidden" checked="checked">
        <label for="settings4"></label>
        </div><!--.switcher-->
        </li>
        <li>
        Birthdays
        <div class="switcher switcher-indigo pull-right">
        <input id="settings5" type="checkbox" hidden="hidden">
        <label for="settings5"></label>
        </div><!--.switcher-->
        </li>
        <li>
        Calendar events
        <div class="switcher switcher-indigo pull-right">
        <input id="settings6" type="checkbox" hidden="hidden">
        <label for="settings6"></label>
        </div><!--.switcher-->
        </li>
        </ul>

        <div class="legend">Newsletter</div>
        <ul>
        <li>
        Friend requests
        <div class="checkboxer checkboxer-indigo pull-right">
        <input type="checkbox" id="checkboxSettings1" value="option1" checked="checked">
        <label for="checkboxSettings1"></label>
        </div>
        </li>
        <li>
        People you may know
        <div class="checkboxer checkboxer-indigo pull-right">
        <input type="checkbox" id="checkboxSettings2" value="option1">
        <label for="checkboxSettings2"></label>
        </div>
        </li>
        </ul>

        </div><!--.settings-panel-->

        </div><!--.col-->
        </div><!--.tab-pane #settings-->
        *}
    </div><!--.row-->
</div><!--.user-layer-->
<script>
    function setDriver() {
        document.getElementById('active_tab_value').value = 'driver';
    }
    function setUser(n) {
        document.getElementById('active_tab_value').value = 'user';
    }
</script>