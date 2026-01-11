<?php get_header(); ?>

<main class="wrap">

  <!-- HERO -->
  <section class="hero">
    <p class="kicker">SAVAGE BY DESIGN — USER GUIDE</p>
    
    <h1>User Guide</h1>
    
    <p class="subhead">
      Complete guide to using the Savage By Design app. Learn how to create training blocks, 
      run workouts, track progress, and manage your data.
    </p>
  </section>

  <!-- CONTENT -->
  <section class="section">
    <p><strong>Welcome to Savage By Design!</strong> This guide will help you get the most out of your workout tracking experience. Whether you're a seasoned athlete or just starting structured training, this app is designed to help you plan, execute, and track your fitness journey.</p>
    <blockquote>
    <p><strong>"We are what we repeatedly do. Excellence, then, is not an act, but a habit."</strong></p>
    </blockquote>
    <hr />
    <h2 id="table-of-contents">Table of Contents</h2>
    <ol>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#understanding-training-blocks">Understanding Training Blocks</a></li>
    <li><a href="#creating-your-first-block">Creating Your First Block</a></li>
    <li><a href="#understanding-exercises">Understanding Exercises</a></li>
    <li><a href="#running-workout-sessions">Running Workout Sessions</a></li>
    <li><a href="#using-the-whiteboard">Using the Whiteboard</a></li>
    <li><a href="#tracking-your-progress">Tracking Your Progress</a></li>
    <li><a href="#ai-block-generation">AI Block Generation</a></li>
    <li><a href="#pro-features">Pro Features</a></li>
    <li><a href="#data-management">Data Management</a></li>
    <li><a href="#tips--best-practices">Tips &amp; Best Practices</a></li>
    <li><a href="#troubleshooting">Troubleshooting</a></li>
    </ol>
    <hr />
    <h2 id="getting-started">Getting Started</h2>
    <h3 id="first-launch">First Launch</h3>
    <p>When you open Savage By Design for the first time, you'll see the <strong>Home Screen</strong> with four main options:</p>
    <ul>
    <li><strong>BLOCKS</strong> – Create and manage your training blocks</li>
    <li><strong>BLOCK HISTORY</strong> – Review archived and completed blocks</li>
    <li><strong>DATA MANAGEMENT</strong> – Backup, restore, and manage your workout data</li>
    <li><strong>GO PRO</strong> – Unlock premium features with a subscription</li>
    </ul>
    <h3 id="navigation">Navigation</h3>
    <p>The app uses a simple, intuitive navigation structure:<br />
    - Tap any button to navigate to that section<br />
    - Use the back button (top-left) to return to the previous screen<br />
    - Swipe gestures work for navigating between weeks during workouts</p>
    <hr />
    <h2 id="understanding-training-blocks">Understanding Training Blocks</h2>
    <h3 id="what-is-a-training-block">What is a Training Block?</h3>
    <p>A <strong>training block</strong> is a structured workout program that spans multiple weeks. Think of it as a complete training cycle designed to help you achieve specific fitness goals.</p>
    <p><strong>Key Components:</strong><br />
    - <strong>Block Name</strong> – What you call your program (e.g., "Summer Strength Program")<br />
    - <strong>Number of Weeks</strong> – How long the block runs (typically 4-12 weeks)<br />
    - <strong>Days</strong> – Individual workout days that repeat each week<br />
    - <strong>Exercises</strong> – The specific movements you'll perform</p>
    <h3 id="block-periodization">Block Periodization</h3>
    <p>The app uses <strong>block periodization</strong>, a proven training method where:<br />
    - You plan workouts in advance<br />
    - Exercises progress week-over-week (progressive overload)<br />
    - You can program deload weeks for recovery<br />
    - Each week builds on the previous one</p>
    <p><strong>Example Block Structure:</strong></p>
    <pre><code>Block: &quot;Spring Strength Cycle&quot;
    ├── Week 1-3: Build phase
    ├── Week 4: Deload
    └── Weeks 5-6: Peak phase

    Days per week:
    ├── Day 1: Upper Body Push
    ├── Day 2: Lower Body
    ├── Day 3: Upper Body Pull
    └── Day 4: Conditioning
    </code></pre>
    <h3 id="training-goals">Training Goals</h3>
    <p>Blocks can target different goals:<br />
    - <strong>Strength</strong> – Build maximum force production<br />
    - <strong>Hypertrophy</strong> – Muscle size and growth<br />
    - <strong>Power</strong> – Explosive strength<br />
    - <strong>Conditioning</strong> – Cardiovascular fitness<br />
    - <strong>Mixed</strong> – Combination of goals<br />
    - <strong>Peaking</strong> – Preparing for competition<br />
    - <strong>Deload</strong> – Recovery and adaptation<br />
    - <strong>Rehab</strong> – Injury recovery</p>
    <hr />
    <h2 id="creating-your-first-block">Creating Your First Block</h2>
    <h3 id="step-1-access-block-builder">Step 1: Access Block Builder</h3>
    <ol>
    <li>From the Home Screen, tap <strong>BLOCKS</strong></li>
    <li>Tap <strong>CREATE NEW BLOCK</strong> at the bottom</li>
    <li>You'll enter the Block Builder interface</li>
    </ol>
    <h3 id="step-2-set-block-details">Step 2: Set Block Details</h3>
    <p><strong>Block Information:</strong><br />
    - <strong>Name</strong> – Give your block a memorable name (e.g., "12-Week Strength Builder")<br />
    - <strong>Description</strong> (optional) – Add notes about the program<br />
    - <strong>Number of Weeks</strong> – Choose how many weeks (1-52)<br />
    - <strong>Progression Type</strong> – How exercises will progress:<br />
      - <strong>Weight</strong> – Add weight each week<br />
      - <strong>Volume</strong> – Add sets/reps each week<br />
      - <strong>Custom</strong> – Manual progression</p>
    <p><strong>Progression Settings:</strong><br />
    - <strong>Delta Weight</strong> – How much weight to add per week (e.g., 5 lbs)<br />
    - <strong>Delta Sets</strong> – How many additional sets per week (e.g., 1 set)</p>
    <h3 id="step-3-create-day-templates">Step 3: Create Day Templates</h3>
    <p>Each block contains <strong>day templates</strong> that define your workouts:</p>
    <ol>
    <li><strong>Select a Day Tab</strong> at the top (Day 1, Day 2, etc.)</li>
    <li><strong>Name Your Day</strong> – E.g., "Upper Body Push", "Legs", "Conditioning"</li>
    <li><strong>Add Exercises</strong> by tapping the <strong>+ ADD EXERCISE</strong> button</li>
    </ol>
    <h3 id="step-4-add-exercises-to-days">Step 4: Add Exercises to Days</h3>
    <p>For each exercise, specify:</p>
    <p><strong>Exercise Details:</strong><br />
    - <strong>Name</strong> – What exercise you're doing (e.g., "Bench Press", "Back Squat")<br />
    - <strong>Type</strong> – Strength or Conditioning<br />
    - <strong>Notes</strong> (optional) – Coaching cues or reminders</p>
    <p><strong>For Strength Exercises:</strong><br />
    - <strong>Number of Sets</strong> – How many sets (e.g., 4)<br />
    - <strong>Reps</strong> – Repetitions per set (e.g., 6)<br />
    - <strong>Weight</strong> – Starting weight in pounds or kg<br />
    - <strong>RPE</strong> (Rating of Perceived Exertion) – Scale of 1-10<br />
    - <strong>RIR</strong> (Reps in Reserve) – How many reps left in the tank<br />
    - <strong>Tempo</strong> – Movement speed (e.g., "3-1-1-0")<br />
    - <strong>Rest</strong> – Seconds between sets (e.g., 180)</p>
    <p><strong>For Conditioning Exercises:</strong><br />
    - <strong>Duration</strong> – Time in seconds<br />
    - <strong>Distance</strong> – Meters or miles<br />
    - <strong>Rounds</strong> – Number of rounds to complete<br />
    - <strong>Calories</strong> – Target calorie burn<br />
    - <strong>Target Pace</strong> – Desired pace (e.g., "2:00/500m")<br />
    - <strong>Effort Descriptor</strong> – Intensity level (e.g., "Easy", "Moderate", "Hard")<br />
    - <strong>Rest</strong> – Recovery time between intervals</p>
    <h3 id="step-5-save-your-block">Step 5: Save Your Block</h3>
    <ol>
    <li>Review all days and exercises</li>
    <li>Tap <strong>SAVE</strong> in the top-right corner</li>
    <li>Your block is now ready to run!</li>
    </ol>
    <p><strong>Pro Tip:</strong> Start with 3-4 days per week and 4-6 exercises per day for your first block.</p>
    <hr />
    <h2 id="understanding-exercises">Understanding Exercises</h2>
    <h3 id="exercise-types">Exercise Types</h3>
    <p>The app supports two main exercise types:</p>
    <h4 id="1-strength-training">1. Strength Training</h4>
    <p><strong>Characteristics:</strong><br />
    - Uses sets, reps, and weight<br />
    - Focuses on resistance training<br />
    - Examples: Squats, bench press, deadlifts, rows, curls</p>
    <p><strong>How to Log:</strong><br />
    - Enter the weight you lifted<br />
    - Record actual reps performed<br />
    - Mark RPE/RIR if tracking intensity<br />
    - Check off each set as completed</p>
    <h4 id="2-conditioning">2. Conditioning</h4>
    <p><strong>Characteristics:</strong><br />
    - Uses time, distance, or calories<br />
    - Focuses on cardiovascular fitness<br />
    - Examples: Running, rowing, cycling, swimming, jump rope</p>
    <p><strong>How to Log:</strong><br />
    - Record time or distance covered<br />
    - Note calories burned (if tracked)<br />
    - Mark rounds completed for intervals<br />
    - Set effort level or pace</p>
    <h3 id="exercise-categories">Exercise Categories</h3>
    <p>Exercises are organized by movement pattern:<br />
    - <strong>Squat</strong> – Squat variations<br />
    - <strong>Hinge</strong> – Deadlift, Romanian deadlift, hip thrusts<br />
    - <strong>Press Horizontal</strong> – Bench press, push-ups, dips<br />
    - <strong>Press Vertical</strong> – Overhead press, push press<br />
    - <strong>Pull Horizontal</strong> – Rows, inverted rows<br />
    - <strong>Pull Vertical</strong> – Pull-ups, lat pulldowns<br />
    - <strong>Carry</strong> – Farmer's carries, suitcase carries<br />
    - <strong>Core</strong> – Planks, ab exercises<br />
    - <strong>Olympic</strong> – Cleans, snatches, jerks<br />
    - <strong>Conditioning</strong> – Cardio and metabolic work<br />
    - <strong>Mobility</strong> – Stretching and movement prep<br />
    - <strong>Other</strong> – Miscellaneous exercises</p>
    <hr />
    <h2 id="running-workout-sessions">Running Workout Sessions</h2>
    <h3 id="starting-a-workout">Starting a Workout</h3>
    <ol>
    <li>Go to <strong>BLOCKS</strong> from the Home Screen</li>
    <li>Find the block you want to run</li>
    <li>Tap the <strong>RUN</strong> button</li>
    <li>The app creates sessions for all weeks based on your templates</li>
    </ol>
    <h3 id="during-your-workout">During Your Workout</h3>
    <p><strong>Week &amp; Day Navigation:</strong><br />
    - <strong>Swipe left/right</strong> to change weeks<br />
    - <strong>Tap day tabs</strong> at the top to switch between workout days<br />
    - The current week is highlighted at the top</p>
    <p><strong>Logging Sets:</strong><br />
    - Each exercise shows <strong>expected values</strong> from your template<br />
    - Tap a set to expand and log your actual performance<br />
    - Use <strong>+ / -</strong> buttons to adjust weight, reps, time, distance, etc.<br />
    - Check the <strong>✓</strong> box when you complete the set<br />
    - The set turns green when marked complete</p>
    <p><strong>Set Status Indicators:</strong><br />
    - <strong>Gray</strong> – Not started<br />
    - <strong>Green with checkmark</strong> – Completed<br />
    - <strong>Progress bar</strong> – Shows how many sets completed</p>
    <p><strong>Auto-Save:</strong><br />
    - The app automatically saves your progress as you go<br />
    - You never lose data, even if you close the app mid-workout</p>
    <h3 id="viewing-the-workout-plan">Viewing the Workout Plan</h3>
    <p><strong>Whiteboard Mode (Pro Feature):</strong><br />
    - Tap <strong>Whiteboard</strong> in the top-right during a workout<br />
    - See a clean, printable view of your entire week<br />
    - Great for referencing between sets or for coaches<br />
    - Shows all exercises, sets, reps, and weights in an easy-to-read format</p>
    <h3 id="finishing-a-workout">Finishing a Workout</h3>
    <ol>
    <li>Complete all the sets you plan to do</li>
    <li>Tap <strong>Close Session</strong> in the top-left</li>
    <li>The app saves all your logged data</li>
    <li>Progress is recorded in your block history</li>
    </ol>
    <p><strong>Week Completion:</strong><br />
    - When you finish all days in a week, you'll see a completion modal<br />
    - Review your stats: sets completed, exercises done<br />
    - Tap <strong>Continue to Next Week</strong> or <strong>Review Week</strong></p>
    <p><strong>Block Completion:</strong><br />
    - When you finish the final week, you'll see a block completion celebration<br />
    - The block is automatically archived to Block History<br />
    - You can review it anytime from the History screen</p>
    <hr />
    <h2 id="using-the-whiteboard">Using the Whiteboard</h2>
    <h3 id="what-is-the-whiteboard">What is the Whiteboard?</h3>
    <p>The <strong>Whiteboard</strong> is a clean, minimal view of your training block that shows:<br />
    - All exercises for each day<br />
    - Sets, reps, and weights<br />
    - Week-by-week progression<br />
    - A format similar to what you'd see on a gym whiteboard</p>
    <h3 id="accessing-the-whiteboard-pro-feature">Accessing the Whiteboard (Pro Feature)</h3>
    <p><strong>During a Workout:</strong><br />
    1. Tap <strong>Whiteboard</strong> in the top-right corner while running a block<br />
    2. Select the week you want to view<br />
    3. Scroll through all your days</p>
    <p><strong>From Block History:</strong><br />
    1. Go to <strong>BLOCK HISTORY</strong><br />
    2. Tap <strong>REVIEW</strong> on any archived block<br />
    3. The whiteboard view opens automatically</p>
    <h3 id="whiteboard-features">Whiteboard Features</h3>
    <ul>
    <li><strong>Week Selector</strong> – Switch between weeks if your block has multiple weeks</li>
    <li><strong>Day Cards</strong> – Each day shows as a card with all exercises</li>
    <li><strong>Full-Screen View</strong> – Tap a day card to see it in full-screen</li>
    <li><strong>No Distractions</strong> – Clean, focused layout perfect for gyms</li>
    </ul>
    <p><strong>Use Cases:</strong><br />
    - Screenshot your week and send it to your coach<br />
    - Print it out and bring it to the gym<br />
    - Share programs with training partners<br />
    - Review past blocks to plan future training</p>
    <hr />
    <h2 id="tracking-your-progress">Tracking Your Progress</h2>
    <h3 id="block-history">Block History</h3>
    <p><strong>Accessing History:</strong><br />
    1. From Home Screen, tap <strong>BLOCK HISTORY</strong><br />
    2. See all your archived blocks<br />
    3. Tap <strong>REVIEW</strong> to see any block's details</p>
    <p><strong>What's Stored:</strong><br />
    - Every set you logged (weight, reps, time, distance)<br />
    - Completion dates<br />
    - Notes you added during workouts<br />
    - Full progression across all weeks</p>
    <h3 id="session-data">Session Data</h3>
    <p>Each workout session records:<br />
    - <strong>Expected vs. Actual</strong> – What you planned vs. what you did<br />
    - <strong>Completion Status</strong> – Which sets you finished<br />
    - <strong>Timestamps</strong> – When sets were completed<br />
    - <strong>RPE/RIR</strong> – Intensity metrics (if you track them)<br />
    - <strong>Notes</strong> – Any comments you added</p>
    <h3 id="analyzing-your-training">Analyzing Your Training</h3>
    <p><strong>Use Block History to:</strong><br />
    - See how you progressed over a training cycle<br />
    - Identify exercises where you improved most<br />
    - Notice patterns (missed workouts, struggled weeks)<br />
    - Plan your next block based on past performance<br />
    - Compare different training approaches</p>
    <p><strong>Pro Tip:</strong> Take progress photos and body measurements outside the app, then reference specific weeks from Block History to correlate with training.</p>
    <hr />
    <h2 id="ai-block-generation">AI Block Generation</h2>
    <h3 id="what-is-ai-block-generation-pro-feature">What is AI Block Generation? (Pro Feature)</h3>
    <p>The app can <strong>import training blocks from JSON files</strong> that are generated by AI or other tools. This allows coaches, programmers, or AI assistants to create structured blocks that you can import directly.</p>
    <h3 id="how-to-use-ai-block-generator">How to Use AI Block Generator</h3>
    <ol>
    <li>From <strong>BLOCKS</strong> screen, tap <strong>AI BLOCK GENERATOR</strong></li>
    <li>You have two options:</li>
    <li><strong>Import from File</strong> – Select a <code>.json</code> file from your device</li>
    <li><strong>Paste JSON</strong> – Copy and paste JSON directly into the app</li>
    </ol>
    <h3 id="json-format-requirements">JSON Format Requirements</h3>
    <p>The JSON must follow the Block structure:<br />
    - Block name, description, number of weeks<br />
    - Day templates with exercises<br />
    - Exercise details (sets, reps, progression)<br />
    - Strength or conditioning parameters</p>
    <p><strong>Example Use Cases:</strong><br />
    - Import programs from online coaches<br />
    - Use ChatGPT or other AI to generate training blocks<br />
    - Share blocks between devices via JSON files<br />
    - Backup and transfer blocks</p>
    <p><strong>Note:</strong> This feature is for <strong>importing</strong> blocks only. The app doesn't generate AI content itself—it imports blocks created externally.</p>
    <hr />
    <h2 id="pro-features">Pro Features</h2>
    <h3 id="subscription-benefits">Subscription Benefits</h3>
    <p><strong>Go Pro</strong> unlocks:<br />
    - ✅ <strong>Whiteboard View</strong> – Clean, printable workout display<br />
    - ✅ <strong>AI Block Import</strong> – Import JSON blocks from external sources<br />
    - ✅ <strong>Unlimited Blocks</strong> – Create as many blocks as you want<br />
    - ✅ <strong>Priority Support</strong> – Get help faster<br />
    - ✅ <strong>Future Features</strong> – Early access to new capabilities</p>
    <h3 id="free-version-includes">Free Version Includes:</h3>
    <ul>
    <li>Create and run training blocks</li>
    <li>Track all workouts with full logging</li>
    <li>Block history and progress tracking</li>
    <li>Exercise library</li>
    <li>Data backup and restore</li>
    <li>All core features</li>
    </ul>
    <h3 id="managing-your-subscription">Managing Your Subscription</h3>
    <ol>
    <li>From Home Screen, tap <strong>GO PRO</strong></li>
    <li>View your current subscription status</li>
    <li><strong>If not subscribed:</strong></li>
    <li>View available plans</li>
    <li>Select monthly or annual</li>
    <li>Start free trial or subscribe</li>
    <li><strong>If subscribed:</strong></li>
    <li>See renewal date</li>
    <li>Manage subscription via Apple</li>
    <li>Cancel anytime (access continues until period ends)</li>
    </ol>
    <p><strong>Subscription Details:</strong><br />
    - Billed through Apple App Store<br />
    - Cancel anytime with no fees<br />
    - Free trial available (check current offer)<br />
    - Auto-renews unless cancelled</p>
    <hr />
    <h2 id="data-management">Data Management</h2>
    <h3 id="backing-up-your-data">Backing Up Your Data</h3>
    <p><strong>Why Backup?</strong><br />
    Your workout data is stored locally on your device. Back it up to:<br />
    - Protect against data loss<br />
    - Transfer to a new device<br />
    - Keep an external copy for safety</p>
    <p><strong>How to Backup:</strong><br />
    1. Go to <strong>DATA MANAGEMENT</strong> from Home Screen<br />
    2. Tap <strong>EXPORT ALL DATA</strong><br />
    3. Choose where to save the file (iCloud, Files app, etc.)<br />
    4. A JSON file is created with all your blocks and sessions</p>
    <p><strong>Backup Contents:</strong><br />
    - All training blocks (active and archived)<br />
    - All workout sessions and logged sets<br />
    - Exercise library<br />
    - Settings and preferences</p>
    <h3 id="restoring-data">Restoring Data</h3>
    <p><strong>How to Restore:</strong><br />
    1. Go to <strong>DATA MANAGEMENT</strong><br />
    2. Tap <strong>IMPORT DATA</strong><br />
    3. Select your backup JSON file<br />
    4. Confirm the import<br />
    5. All data is restored</p>
    <p><strong>Important Notes:</strong><br />
    - Importing <strong>replaces</strong> existing data<br />
    - Always export current data before importing<br />
    - Restore files must be valid JSON in the correct format</p>
    <h3 id="starting-fresh">Starting Fresh</h3>
    <p><strong>Clear All Data:</strong><br />
    1. Go to <strong>DATA MANAGEMENT</strong><br />
    2. Tap <strong>CLEAR ALL DATA</strong><br />
    3. Confirm the action (THIS CANNOT BE UNDONE)<br />
    4. Recommended: Export backup first</p>
    <p><strong>When to Clear Data:</strong><br />
    - Starting a new training phase completely fresh<br />
    - Troubleshooting issues<br />
    - Handing device to someone else</p>
    <hr />
    <h2 id="tips--best-practices">Tips &amp; Best Practices</h2>
    <h3 id="for-beginners">For Beginners</h3>
    <ol>
    <li><strong>Start Simple</strong></li>
    <li>Create a 4-week block with 3 days per week</li>
    <li>Focus on basic compound exercises</li>
    <li>
    <p>Use 3-4 sets of 5-8 reps for strength</p>
    </li>
    <li>
    <p><strong>Learn the Interface</strong></p>
    </li>
    <li>Run through a test workout to understand logging</li>
    <li>Explore the Whiteboard view</li>
    <li>
    <p>Practice saving and editing blocks</p>
    </li>
    <li>
    <p><strong>Be Consistent</strong></p>
    </li>
    <li>Stick to your schedule</li>
    <li>Log every set, even if you don't hit targets</li>
    <li>Review your history weekly</li>
    </ol>
    <h3 id="for-advanced-users">For Advanced Users</h3>
    <ol>
    <li><strong>Progressive Overload</strong></li>
    <li>Use the Delta Weight/Sets features</li>
    <li>Plan deload weeks (week 4, 8, 12)</li>
    <li>
    <p>Track RPE/RIR for intensity management</p>
    </li>
    <li>
    <p><strong>Block Programming</strong></p>
    </li>
    <li>Create specialized blocks (strength, hypertrophy, peaking)</li>
    <li>Use week templates for varied programming</li>
    <li>
    <p>Clone successful blocks and adjust for next cycle</p>
    </li>
    <li>
    <p><strong>Superset &amp; Circuits</strong></p>
    </li>
    <li>Group exercises by assigning Set Group IDs (in advanced mode)</li>
    <li>Plan rest periods strategically</li>
    <li>Use conditioning blocks for metabolic work</li>
    </ol>
    <h3 id="general-tips">General Tips</h3>
    <p>✅ <strong>DO:</strong><br />
    - Log every workout, even if incomplete<br />
    - Review previous weeks before planning the next block<br />
    - Use notes fields for coaching cues<br />
    - Export data backups monthly<br />
    - Screenshot your whiteboard for quick reference</p>
    <p>❌ <strong>DON'T:</strong><br />
    - Skip logging—you lose valuable data<br />
    - Delete blocks immediately after completion (archive first)<br />
    - Forget to progress weight/volume across weeks<br />
    - Ignore deload weeks—recovery is training</p>
    <h3 id="sample-programs-to-try">Sample Programs to Try</h3>
    <p><strong>Beginner Strength (4 weeks, 3 days/week):</strong><br />
    - Day 1: Squat, Bench, Rows<br />
    - Day 2: Deadlift, Overhead Press, Pull-ups<br />
    - Day 3: Conditioning + Accessories</p>
    <p><strong>Intermediate Hypertrophy (6 weeks, 4 days/week):</strong><br />
    - Day 1: Upper Push (8-12 reps)<br />
    - Day 2: Lower (8-12 reps)<br />
    - Day 3: Upper Pull (8-12 reps)<br />
    - Day 4: Full Body or Conditioning</p>
    <p><strong>Advanced Strength (12 weeks, 5 days/week):</strong><br />
    - Linear periodization from 5x5 to 3x3 to 1x1<br />
    - Deloads on weeks 4, 8, 12<br />
    - Accessory work at 3x10-15</p>
    <hr />
    <h2 id="troubleshooting">Troubleshooting</h2>
    <h3 id="common-issues">Common Issues</h3>
    <p><strong>Q: My workout isn't saving</strong><br />
    - Check that you tapped the checkmark to complete sets<br />
    - Ensure you have storage space on your device<br />
    - Try closing and reopening the session<br />
    - The app auto-saves—your data should be there</p>
    <p><strong>Q: I can't see my completed block</strong><br />
    - Check <strong>BLOCK HISTORY</strong> (not BLOCKS)<br />
    - Archived blocks move automatically after completion<br />
    - Use the search function if you have many blocks</p>
    <p><strong>Q: Progression isn't working</strong><br />
    - Verify Delta Weight/Sets in block settings<br />
    - Check that progression type is set correctly<br />
    - Some exercises may need manual adjustment</p>
    <p><strong>Q: I lost my data</strong><br />
    - Data is stored locally—if you deleted the app, it's gone<br />
    - Restore from a backup if you exported data<br />
    - In the future, export backups regularly</p>
    <p><strong>Q: Whiteboard/AI Generator says "Pro Only"</strong><br />
    - These are subscription features<br />
    - Tap <strong>GO PRO</strong> to unlock<br />
    - Free trial may be available</p>
    <p><strong>Q: Exercise won't save</strong><br />
    - Make sure name field isn't empty<br />
    - Check that sets/reps have valid numbers<br />
    - Type must be either Strength or Conditioning</p>
    <h3 id="getting-help">Getting Help</h3>
    <p><strong>In-App Support:</strong><br />
    - Tap <strong>GO PRO</strong> → <strong>Contact Support</strong> (Pro users)<br />
    - Use GitHub Issues for bugs: <a href="https://github.com/kje7713-dev/WorkoutTrackerApp/issues">github.com/kje7713-dev/WorkoutTrackerApp/issues</a></p>
    <p><strong>Community:</strong><br />
    - GitHub Discussions: <a href="https://github.com/kje7713-dev/WorkoutTrackerApp/discussions">github.com/kje7713-dev/WorkoutTrackerApp/discussions</a><br />
    - Share your programs and get feedback</p>
    <hr />
    <h2 id="glossary">Glossary</h2>
    <p><strong>Block</strong><br />
    : A complete training program spanning multiple weeks</p>
    <p><strong>Day Template</strong><br />
    : A workout day design that repeats each week</p>
    <p><strong>Session</strong><br />
    : A single workout instance with logged data</p>
    <p><strong>Set</strong><br />
    : One round of an exercise (e.g., 5 reps at 185 lbs)</p>
    <p><strong>Progressive Overload</strong><br />
    : Gradually increasing training stress (weight, volume, intensity)</p>
    <p><strong>Deload</strong><br />
    : Reduced training volume for recovery</p>
    <p><strong>RPE (Rating of Perceived Exertion)</strong><br />
    : Scale of 1-10, how hard the set felt</p>
    <p><strong>RIR (Reps in Reserve)</strong><br />
    : How many more reps you could have done</p>
    <p><strong>Tempo</strong><br />
    : Movement speed (eccentric-pause-concentric-pause in seconds)</p>
    <p><strong>Superset</strong><br />
    : Two exercises performed back-to-back with no rest</p>
    <p><strong>Circuit</strong><br />
    : Multiple exercises performed sequentially</p>
    <p><strong>AMRAP</strong><br />
    : As Many Reps/Rounds As Possible</p>
    <p><strong>EMOM</strong><br />
    : Every Minute On the Minute</p>
    <p><strong>Periodization</strong><br />
    : Systematic planning of training variables over time</p>
    <hr />
    <h2 id="final-thoughts">Final Thoughts</h2>
    <p><strong>Savage By Design</strong> is built to help you structure your training, track your progress, and achieve your goals. Whether you're working with a coach, following an online program, or designing your own training, this app gives you the tools to be consistent and deliberate.</p>
    <blockquote>
    <p>"Excellence is not an act, but a habit."</p>
    </blockquote>
    <p><strong>Your success comes from showing up, logging the work, and progressing systematically.</strong></p>
    <p>💪 Now get out there and train!</p>
    <hr />
    <h3 id="quick-start-checklist">Quick Start Checklist</h3>
    <ul>
    <li>[ ] Create your first training block (BLOCKS → CREATE NEW BLOCK)</li>
    <li>[ ] Add 3-4 workout days with exercises</li>
    <li>[ ] Set your progression (Delta Weight or Delta Sets)</li>
    <li>[ ] Tap RUN to start your first session</li>
    <li>[ ] Log at least one complete workout</li>
    <li>[ ] Review your history (BLOCK HISTORY)</li>
    <li>[ ] Export a backup (DATA MANAGEMENT)</li>
    <li>[ ] Consider upgrading to Pro for Whiteboard access</li>
    </ul>
    <hr />
    <p><strong>Need more help?</strong> Visit our <a href="https://github.com/kje7713-dev/WorkoutTrackerApp">GitHub repository</a> for updates and support.</p>
  </section>

</main>

<?php get_footer(); ?>
