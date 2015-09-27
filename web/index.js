// Add event handlers
$(document).ready(function() {
    cookieSetup();
    onLoadHandlers();
});

function onLoadHandlers() {
    $("#test-button").click(function() {
        fireDrip(function(message) {
            if (message.message) {
               addMessage(message.message);
            }
        },
        {method: "message", user: $.cookie("user")});
    });
}

function cookieSetup() {
    if (! $.cookie("created")) {
        fireDrip(function(data) {
            $.cookie("created", data.created);
            $.cookie("updated", data.updated);
            $.cookie("user", data.user);
        },
        {method: "newUser", user: 1}
        );
    }
}

// Fire function to send some data and receive an update from the server
function fireDrip(callback, params) {
    // pretend to send to server
    $.ajax({
        url: "drip.php",
        data: params,
        dataType: "json",
        method: "POST"
    }).success(function(data) {
        callback(data);
    }).error(function(error) {
        console.log("failed getting test");
        console.log(error);
        callback(false);
    });
}

// Fucntions to change the page
function addMessage(message) {
    // count the items in the list
    $("#test-button").prop('disabled', true);
    var story = $("#story ul");
    if (story.find("li").length > 2) {
        // remove last
        $(message).hide().prependTo(story).fadeIn("slow", function() {
            story.find("li:last-child").fadeOut("slow", function() {
                this.remove();
                $("#test-button").prop('disabled', false);
            });
        });
    }
    
    
}
