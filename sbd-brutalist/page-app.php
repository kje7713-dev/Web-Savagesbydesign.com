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
    <li><a href="#understanding-segments">Understanding Segments</a></li>
    <li><a href="#segment-use-cases">Segment Use Cases</a></li>
    <li><a href="#creating-segment-based-days">Creating Segment-Based Days</a></li>
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
    <h2 id="understanding-segments">Understanding Segments</h2>
    <h3 id="what-are-segments">What are Segments?</h3>
    <p><strong>Segments</strong> are an alternative way to structure training days, designed for activities that don't fit the traditional sets/reps/weight model. While exercises focus on strength and conditioning with quantifiable metrics, segments represent distinct phases or modules within a training session.</p>
    <p><strong>Key Differences:</strong></p>
    <table>
    <thead>
    <tr>
    <th><strong>Exercises</strong></th>
    <th><strong>Segments</strong></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>Sets, reps, weight</td>
    <td>Time-based modules</td>
    </tr>
    <tr>
    <td>Strength &amp; conditioning focused</td>
    <td>Skill-based activities</td>
    </tr>
    <tr>
    <td>Progressive overload via weight/volume</td>
    <td>Progressive via complexity/resistance</td>
    </tr>
    <tr>
    <td>Examples: Squats, bench press</td>
    <td>Examples: Technique work, sparring rounds</td>
    </tr>
    </tbody>
    </table>
    <h3 id="when-to-use-segments-vs-exercises">When to Use Segments vs. Exercises</h3>
    <p><strong>Use Exercises for:</strong><br />
    - Weightlifting and strength training<br />
    - Conditioning with measurable outputs (distance, calories, time)<br />
    - Activities with clear set/rep structures<br />
    - Progressive overload through weight or volume</p>
    <p><strong>Use Segments for:</strong><br />
    - Martial arts training (BJJ, wrestling, judo, MMA)<br />
    - Yoga and mobility work<br />
    - Skill-based practice sessions<br />
    - Class-style training with distinct phases<br />
    - Activities focused on technique over load</p>
    <p><strong>Hybrid Approach:</strong><br />
    You can mix both in a single day! For example:<br />
    - Strength training (exercises) followed by mobility work (segments)<br />
    - BJJ class (segments) with conditioning finisher (exercises)</p>
    <h3 id="segment-types">Segment Types</h3>
    <p>The app supports various segment types to match your training structure:</p>
    <h4 id="1-warmup">1. Warmup</h4>
    <p><strong>Purpose:</strong> Prepare the body and mind for training<br />
    <strong>Typical Duration:</strong> 5-10 minutes<br />
    <strong>Examples:</strong><br />
    - Dynamic stretching sequences<br />
    - Movement preparation drills<br />
    - Sport-specific warm-up patterns<br />
    - General cardiovascular warm-up</p>
    <p><strong>What to Include:</strong><br />
    - Light movement to raise body temperature<br />
    - Joint mobility work<br />
    - Movement patterns used in the session<br />
    - Mental preparation and focus</p>
    <h4 id="2-mobility">2. Mobility</h4>
    <p><strong>Purpose:</strong> Flexibility, range of motion, and movement quality<br />
    <strong>Typical Duration:</strong> 10-20 minutes<br />
    <strong>Examples:</strong><br />
    - Yoga flows<br />
    - Dynamic stretching routines<br />
    - Joint mobility sequences<br />
    - Foam rolling protocols</p>
    <p><strong>Tracking Options:</strong><br />
    - Hold duration (seconds)<br />
    - Breath count<br />
    - Intensity scale (restorative to peak)<br />
    - Props used (blocks, straps, rollers)</p>
    <h4 id="3-technique">3. Technique</h4>
    <p><strong>Purpose:</strong> Learn and refine specific skills or movements<br />
    <strong>Typical Duration:</strong> 10-20 minutes<br />
    <strong>Examples:</strong><br />
    - Martial arts technique instruction<br />
    - Movement pattern practice<br />
    - Skill progressions<br />
    - Form work</p>
    <p><strong>What to Track:</strong><br />
    - Techniques covered<br />
    - Key coaching cues<br />
    - Common errors to avoid<br />
    - Success rate and clean reps</p>
    <h4 id="4-drill">4. Drill</h4>
    <p><strong>Purpose:</strong> Repetitive practice with specific constraints<br />
    <strong>Typical Duration:</strong> 5-15 minutes<br />
    <strong>Examples:</strong><br />
    - Timed drill circuits<br />
    - Partner drilling sequences<br />
    - Positional repetitions<br />
    - Skill isolation work</p>
    <p><strong>Structure Options:</strong><br />
    - Work/rest intervals<br />
    - Rep-based progressions<br />
    - Partner rotation schedules<br />
    - Constraint progressions</p>
    <h4 id="5-positional-sparring">5. Positional Sparring</h4>
    <p><strong>Purpose:</strong> Live practice from specific positions with defined rules<br />
    <strong>Typical Duration:</strong> 10-20 minutes<br />
    <strong>Examples:</strong><br />
    - Grappling from specific positions<br />
    - Scenario-based sparring<br />
    - Flow rolling with constraints<br />
    - Positional battles</p>
    <p><strong>Key Features:</strong><br />
    - Starting positions defined<br />
    - Win conditions specified<br />
    - Resistance levels (0-100%)<br />
    - Role definitions (attacker/defender)</p>
    <h4 id="6-rolling-live-training">6. Rolling / Live Training</h4>
    <p><strong>Purpose:</strong> Free practice or sparring<br />
    <strong>Typical Duration:</strong> 15-30 minutes<br />
    <strong>Examples:</strong><br />
    - Free rolling (BJJ)<br />
    - Live wrestling<br />
    - Open sparring rounds<br />
    - Competition simulation</p>
    <p><strong>Typical Format:</strong><br />
    - Round-based (e.g., 5 rounds × 5 minutes)<br />
    - Rest intervals between rounds<br />
    - Partner rotation<br />
    - Intensity management</p>
    <h4 id="7-cooldown">7. Cooldown</h4>
    <p><strong>Purpose:</strong> Recovery and transition out of training<br />
    <strong>Typical Duration:</strong> 5-10 minutes<br />
    <strong>Examples:</strong><br />
    - Static stretching<br />
    - Breathwork<br />
    - Gentle movement<br />
    - Reflection and notes</p>
    <p><strong>Recovery Focus:</strong><br />
    - Lower heart rate gradually<br />
    - Address tight areas<br />
    - Mental recovery<br />
    - Session review</p>
    <h4 id="8-lecture-review">8. Lecture / Review</h4>
    <p><strong>Purpose:</strong> Instructional content and conceptual learning<br />
    <strong>Typical Duration:</strong> 5-15 minutes<br />
    <strong>Examples:</strong><br />
    - Video review<br />
    - Strategy discussion<br />
    - Conceptual instruction<br />
    - Q&amp;A sessions</p>
    <h4 id="9-breathwork">9. Breathwork</h4>
    <p><strong>Purpose:</strong> Respiratory training and nervous system regulation<br />
    <strong>Typical Duration:</strong> 5-15 minutes<br />
    <strong>Examples:</strong><br />
    - Box breathing<br />
    - Diaphragmatic breathing<br />
    - Wim Hof method<br />
    - Pranayama techniques</p>
    <p><strong>Tracking:</strong><br />
    - Breathing pattern (e.g., "4s inhale / 6s exhale")<br />
    - Duration<br />
    - Breath count<br />
    - Style/method used</p>
    <h4 id="10-other">10. Other</h4>
    <p><strong>Purpose:</strong> Custom segment types not covered above<br />
    <strong>Use for:</strong> Any activity that doesn't fit standard categories</p>
    <hr />
    <h2 id="segment-use-cases">Segment Use Cases</h2>
    <p>Segments are incredibly versatile and can be used for <strong>far more than just athletic training</strong>. This section showcases how segments can structure any time-based learning or skill development activity.</p>
    <h3 id="traditional-athletic-training">Traditional Athletic Training</h3>
    <ul>
    <li>Brazilian Jiu-Jitsu (BJJ) classes</li>
    <li>Yoga and mobility work</li>
    <li>Wrestling practice</li>
    <li>MMA striking classes</li>
    <li>Hybrid athlete programs (strength + mobility)</li>
    <li>Open mat / free training sessions</li>
    </ul>
    <h3 id="non-traditional-learning--skill-development">Non-Traditional Learning &amp; Skill Development</h3>
    <ul>
    <li><strong>Technology &amp; AI Learning:</strong> Coding bootcamps, AI/ML classes, software development</li>
    <li><strong>Language Learning:</strong> Conversation practice, grammar drills, vocabulary building</li>
    <li><strong>Music Practice:</strong> Instrument technique, improvisation, composition</li>
    <li><strong>Professional Development:</strong> Public speaking, leadership training, presentation skills</li>
    <li><strong>Academic Study:</strong> Research sessions, exam preparation, concept mastery</li>
    <li><strong>Creative Skills:</strong> Writing workshops, design critique sessions, art practice</li>
    </ul>
    <p>The examples below demonstrate how segments provide structure for both athletic and non-athletic pursuits. <strong>The key is recognizing that any activity with distinct time-based phases can benefit from segment structure.</strong></p>
    <h3 id="use-case-1-brazilian-jiu-jitsu-bjj-class">Use Case 1: Brazilian Jiu-Jitsu (BJJ) Class</h3>
    <p><strong>Structure:</strong> Segment-based day representing a typical BJJ class</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>BJJ Class: Inside Tie to Single Leg (60 minutes)

    1. Warmup (8 min)
       - General movement and grappling prep
       - Stance work and sprawls
       - Partner pummeling

    2. Technique 1 (12 min)
       - Inside tie to single leg entry
       - Partner drilling with light resistance
       - Focus: Clean entry and head position

    3. Technique 2 (12 min)
       - Single leg finishing options
       - Run-the-pipe and shelf finishes
       - Partner drilling with progression

    4. Drill (10 min)
       - Constrained drilling with specific rules
       - Timed rounds with quality focus
       - Partner rotation

    5. Positional Sparring (10 min)
       - From standing, must attempt single within 10s
       - Win conditions: Takedown + 3s control
       - Moderate resistance (50%)

    6. Live Rolling (6 min)
       - 2 rounds × 3 minutes
       - Free rolling to integrate techniques
       - Rest 30s between rounds

    7. Cooldown (2 min)
       - Light stretching
       - Breathwork
    </code></pre>
    <p><strong>Why Segments Work Better Than Exercises:</strong><br />
    - Class structure is time-based, not set-based<br />
    - Focus on skill acquisition, not weight progression<br />
    - Roles (attacker/defender) and resistance levels matter<br />
    - Quality metrics (success rate, clean reps) more relevant than total volume</p>
    <p><strong>Tracking During Session:</strong><br />
    - Check off completed segments<br />
    - Log rounds completed<br />
    - Note success rate for positional work<br />
    - Record coach feedback and personal observations</p>
    <h3 id="use-case-2-yoga-practice">Use Case 2: Yoga Practice</h3>
    <p><strong>Structure:</strong> Segment-based yoga session</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Restorative Yoga (45 minutes)

    1. Breathwork (5 min)
       - Diaphragmatic breathing
       - Pattern: 4s inhale / 6s exhale
       - Seated meditation posture

    2. Gentle Flow (15 min)
       - Sun salutations modified
       - Intensity: Easy
       - Props: Block, strap
       - Flow sequence:
         • Child's Pose (60s)
         • Cat-Cow (20s, move with breath)
         • Downward Dog (60s)
         • Forward fold variations

    3. Deep Stretch (20 min)
       - Hold-based poses
       - Intensity: Restorative
       - Props: Blocks, bolster
       - Poses:
         • Pigeon pose (2 min each side)
         • Supine twist (90s each side)
         • Forward fold (3 min)

    4. Savasana (5 min)
       - Final relaxation
       - Body scan meditation
    </code></pre>
    <p><strong>Why Segments Work:</strong><br />
    - Time-based holds rather than reps<br />
    - Flow sequences with transitions<br />
    - Intensity scale (restorative to peak)<br />
    - Props tracking<br />
    - Breath awareness integration</p>
    <h3 id="use-case-3-wrestling-practice">Use Case 3: Wrestling Practice</h3>
    <p><strong>Structure:</strong> Segment-based wrestling training</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Folkstyle Wrestling: Neutral Position (90 minutes)

    1. Warmup (10 min)
       - Stance and motion
       - Penetration steps
       - Sprawl drills

    2. Technique (20 min)
       - Double leg variations
       - Head position and hand placement
       - Finishing sequences

    3. Drill (15 min)
       - Shot + sprawl + reshot
       - Timed intervals: 1 min work / 30s rest
       - Partner rotation every 3 rounds

    4. Positional Sparring (20 min)
       - Standing neutral only
       - Reset after takedown
       - 4 rounds × 3 min / 1 min rest

    5. Live Wrestling (20 min)
       - Full match situation
       - 6 rounds × 2 min / 1 min rest
       - Competition intensity

    6. Cooldown (5 min)
       - Static stretching
       - Hip and shoulder mobility
    </code></pre>
    <h3 id="use-case-4-mma-striking-class">Use Case 4: MMA Striking Class</h3>
    <p><strong>Structure:</strong> Segment-based striking session</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Boxing Fundamentals (60 minutes)

    1. Warmup (8 min)
       - Jump rope
       - Shadow boxing
       - Dynamic stretching

    2. Technique (15 min)
       - Jab-cross-hook combinations
       - Footwork patterns
       - Head movement drills

    3. Drill (12 min)
       - Pad work with partner
       - 2 min rounds / 30s rest
       - Focus on form and snap

    4. Positional Sparring (15 min)
       - Jab and circle only
       - Light contact (30% power)
       - Work distance management

    5. Conditioning (8 min)
       - Heavy bag intervals
       - 30s max output / 30s rest
       - 8 rounds total

    6. Cooldown (2 min)
       - Light stretching
       - Breathing exercises
    </code></pre>
    <h3 id="use-case-5-hybrid-day-strength-mobility">Use Case 5: Hybrid Day (Strength + Mobility)</h3>
    <p><strong>Structure:</strong> Mix exercises and segments in one day</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Lower Body Strength + Mobility (75 minutes)

    EXERCISES (Traditional format):
    1. Back Squat: 4 sets × 5 reps @ 225 lbs
    2. Romanian Deadlift: 3 sets × 8 reps @ 185 lbs
    3. Bulgarian Split Squat: 3 sets × 10 reps @ 60 lbs

    SEGMENTS (Time-based format):
    4. Hip Mobility (10 min)
       - 90/90 hip stretches
       - Hip flexor work
       - Adductor stretching

    5. Yoga Flow (15 min)
       - Warrior sequences
       - Deep lunges
       - Pigeon pose variations

    6. Breathwork (5 min)
       - Recovery breathing
       - Parasympathetic activation
    </code></pre>
    <p><strong>Benefits of Hybrid Approach:</strong><br />
    - Use appropriate structure for each activity type<br />
    - Track strength metrics for lifting<br />
    - Track quality and time for mobility<br />
    - Single cohesive training day</p>
    <h3 id="use-case-6-open-mat-free-training">Use Case 6: Open Mat / Free Training</h3>
    <p><strong>Structure:</strong> Simple segment structure for unstructured training</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Open Mat Session (60 minutes)

    1. Warmup (5 min)
       - Self-directed movement prep

    2. Technique Review (15 min)
       - Work on personal weaknesses
       - Notes: Reviewed guard retention concepts

    3. Positional Work (20 min)
       - Various starting positions
       - Partner: Advanced blue belt
       - Notes: Focused on maintaining frames

    4. Live Rolling (15 min)
       - 3 rounds × 4 min
       - Mixed intensity
       - Notes: Worked on staying calm

    5. Cooldown (5 min)
       - Stretching and reflection
    </code></pre>
    <p><strong>Flexibility:</strong><br />
    - Less structured than formal class<br />
    - Still captures time allocation<br />
    - Notes field for personalization<br />
    - Tracks training volume</p>
    <h3 id="use-case-7-aitech-class-learning">Use Case 7: AI/Tech Class Learning</h3>
    <p><strong>Structure:</strong> Segment-based learning session for technology training</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Machine Learning Fundamentals (90 minutes)

    1. Review / Lecture (15 min)
       - Review previous week's concepts
       - Introduction to neural networks
       - Key concepts: Forward propagation, backpropagation
       
    2. Technique (30 min)
       - Live coding demonstration
       - Building a simple neural network in Python
       - Key details: Layer architecture, activation functions
       - Common errors: Dimension mismatches, learning rate issues
       
    3. Drill (30 min)
       - Hands-on coding exercises
       - Work: Implement network layer (10 min)
       - Rest: Review solution and debug (5 min)
       - Repeat 2x with different architectures
       
    4. Other - Project Work (10 min)
       - Apply concepts to personal project
       - Notes: Tested model on custom dataset
       
    5. Review (5 min)
       - Key takeaways and next steps
       - Questions for further study
    </code></pre>
    <p><strong>Why Segments Work:</strong><br />
    - Time-based learning modules<br />
    - Lecture, demonstration, and practice phases<br />
    - Quality metrics: Concept understanding, code completion<br />
    - Notes field for capturing insights and questions</p>
    <p><strong>Tracking During Session:</strong><br />
    - Check off completed segments<br />
    - Log understanding level or completion rate<br />
    - Note challenging concepts for review<br />
    - Record resources or documentation references</p>
    <h3 id="use-case-8-language-learning-session">Use Case 8: Language Learning Session</h3>
    <p><strong>Structure:</strong> Segment-based language practice</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Spanish Conversation Practice (60 minutes)

    1. Warmup (10 min)
       - Vocabulary flashcard review
       - Quick pronunciation drills
       - Present tense conjugation practice
       
    2. Technique (15 min)
       - New grammar concept: Subjunctive mood
       - Key details: Trigger phrases, conjugation patterns
       - Common errors: Indicative vs. subjunctive confusion
       - Examples with translations
       
    3. Drill (20 min)
       - Sentence construction exercises
       - Work: Create 5 sentences using subjunctive (5 min)
       - Review: Check with answer key (2 min)
       - Repeat 3x with different contexts
       
    4. Positional - Conversation Practice (10 min)
       - Partner conversation or language exchange
       - Scenario: Restaurant ordering
       - Role: Customer, then switch to server
       - Intensity: Moderate (some English allowed for clarification)
       
    5. Other - Listening Comprehension (3 min)
       - Podcast or video in target language
       - Notes: Understood main points, struggled with idioms
       
    6. Review (2 min)
       - Reflection on progress
       - Note new vocabulary learned
    </code></pre>
    <p><strong>Benefits of Segment Structure:</strong><br />
    - Captures varied learning activities<br />
    - Time allocation for each skill (reading, writing, listening, speaking)<br />
    - Quality tracking: Vocabulary retained, grammar accuracy<br />
    - Notes for challenging concepts</p>
    <h3 id="use-case-9-music-practice-session">Use Case 9: Music Practice Session</h3>
    <p><strong>Structure:</strong> Segment-based music skill development</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Guitar Practice: Blues Improvisation (75 minutes)

    1. Warmup (10 min)
       - Finger exercises and scales
       - Chromatic warm-up
       - Major and minor pentatonic scales
       
    2. Technique (20 min)
       - New concept: Blues turnaround phrases
       - Key details: Rhythm, bending technique, phrasing
       - Common errors: Rushing the turnaround, poor intonation
       - Video reference: Blues masters demonstration
       
    3. Drill (20 min)
       - Repetitive practice of turnaround licks
       - Work: Play phrase 10x slow (5 min)
       - Work: Play phrase 10x medium tempo (5 min)
       - Work: Play phrase to backing track (5 min)
       - Rest: Listen back to recording (5 min)
       
    4. Other - Improvisation (20 min)
       - Free improvisation over 12-bar blues backing track
       - Goal: Incorporate new turnaround phrases
       - Rounds: 4 rounds × 3 minutes / 2 min rest
       - Notes: Successfully used turnaround in rounds 2 and 4
       
    5. Review (5 min)
       - Record best take for progress tracking
       - Note areas for improvement
       - Plan next session focus
    </code></pre>
    <p><strong>Why Segments Work Better:</strong><br />
    - Time-based practice modules<br />
    - Technique isolation before integration<br />
    - Quality over quantity metrics<br />
    - Recording and reflection components</p>
    <h3 id="use-case-10-professional-skill-development">Use Case 10: Professional Skill Development</h3>
    <p><strong>Structure:</strong> Segment-based professional training</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Public Speaking Workshop (120 minutes)

    1. Lecture / Review (20 min)
       - Theory: Vocal variety and pacing
       - Video examples: TED Talk analysis
       - Key concepts: Pausing for emphasis, tone modulation
       
    2. Warmup (10 min)
       - Vocal warm-up exercises
       - Breathing and projection drills
       - Tongue twisters for articulation
       
    3. Technique (25 min)
       - Demonstration: Effective speech opening techniques
       - Key details: Hook attention, establish credibility, preview content
       - Common errors: Starting with apology, monotone delivery
       - Practice: Each participant delivers 2-minute opener
       
    4. Drill (30 min)
       - Timed practice rounds with specific constraints
       - Round 1 (5 min): Focus on vocal variety only
       - Rest (2 min): Receive peer feedback
       - Round 2 (5 min): Focus on pacing and pauses
       - Rest (2 min): Receive peer feedback
       - Round 3 (5 min): Integrate all elements
       
    5. Other - Full Presentation (25 min)
       - Each participant: 5-minute presentation
       - Video recorded for self-review
       - Notes: Audience questions, feedback points
       
    6. Review (10 min)
       - Group discussion
       - Personal reflection on strengths and areas to improve
       - Action items for next session
    </code></pre>
    <p><strong>Tracking Options:</strong><br />
    - Completion of each segment<br />
    - Quality metrics: Confidence level, audience engagement<br />
    - Feedback notes from instructor or peers<br />
    - Self-assessment scores</p>
    <h3 id="use-case-11-studyresearch-session">Use Case 11: Study/Research Session</h3>
    <p><strong>Structure:</strong> Segment-based academic or research work</p>
    <p><strong>Example Day Structure:</strong></p>
    <pre><code>Research Methods Study Block (90 minutes)

    1. Lecture / Review (20 min)
       - Reading: Chapter on experimental design
       - Key concepts: Control variables, randomization, blinding
       - Notes: Definitions and examples
       
    2. Technique (25 min)
       - Learn: How to identify confounding variables
       - Practice examples from textbook
       - Common errors: Missing interaction effects
       
    3. Drill (20 min)
       - Problem set exercises
       - Work: Complete 5 practice problems (15 min)
       - Review: Check answers and understand mistakes (5 min)
       
    4. Other - Application (20 min)
       - Apply concepts to thesis research design
       - Draft experimental protocol
       - Notes: Identified 3 potential confounds to control
       
    5. Review (5 min)
       - Summarize key learnings
       - Create flashcards for important terms
       - Plan next study session topics
    </code></pre>
    <p><strong>Benefits:</strong><br />
    - Structured study time with clear phases<br />
    - Active learning through application<br />
    - Self-testing and review built in<br />
    - Progress tracking across study sessions</p>
    <hr />
    <h2 id="creating-segment-based-days">Creating Segment-Based Days</h2>
    <h3 id="method-1-json-import-pro-feature">Method 1: JSON Import (Pro Feature)</h3>
    <p>Segment-based days are currently created by importing JSON files. This allows for detailed specification of all segment properties.</p>
    <p><strong>Basic JSON Structure:</strong></p>
    <pre><code class="language-json">{
      &quot;Title&quot;: &quot;BJJ Class Template&quot;,
      &quot;NumberOfWeeks&quot;: 4,
      &quot;Days&quot;: [
        {
          &quot;name&quot;: &quot;BJJ Fundamentals&quot;,
          &quot;segments&quot;: [
            {
              &quot;name&quot;: &quot;General Warmup&quot;,
              &quot;segmentType&quot;: &quot;warmup&quot;,
              &quot;domain&quot;: &quot;grappling&quot;,
              &quot;durationMinutes&quot;: 8,
              &quot;objective&quot;: &quot;Prepare body for grappling&quot;,
              &quot;drillPlan&quot;: {
                &quot;items&quot;: [
                  {
                    &quot;name&quot;: &quot;Stance and motion&quot;,
                    &quot;workSeconds&quot;: 60,
                    &quot;restSeconds&quot;: 15
                  }
                ]
              }
            },
            {
              &quot;name&quot;: &quot;Technique Work&quot;,
              &quot;segmentType&quot;: &quot;technique&quot;,
              &quot;domain&quot;: &quot;grappling&quot;,
              &quot;durationMinutes&quot;: 15,
              &quot;objective&quot;: &quot;Learn single leg entry&quot;,
              &quot;techniques&quot;: [
                {
                  &quot;name&quot;: &quot;Single leg takedown&quot;,
                  &quot;keyDetails&quot;: [
                    &quot;Level change first&quot;,
                    &quot;Head position outside&quot;
                  ],
                  &quot;commonErrors&quot;: [
                    &quot;Reaching with arms&quot;,
                    &quot;Head down&quot;
                  ]
                }
              ],
              &quot;partnerPlan&quot;: {
                &quot;rounds&quot;: 3,
                &quot;roundDurationSeconds&quot;: 180,
                &quot;restSeconds&quot;: 60,
                &quot;resistance&quot;: 30
              }
            }
          ]
        }
      ]
    }
    </code></pre>
    <h3 id="method-2-using-ai-block-generator-pro-feature">Method 2: Using AI Block Generator (Pro Feature)</h3>
    <ol>
    <li>From <strong>BLOCKS</strong> screen, tap <strong>AI BLOCK GENERATOR</strong></li>
    <li>Use AI tools (ChatGPT, Claude, etc.) to generate segment-based blocks</li>
    <li>Prompt example: <br />
    <code>"Create a 4-week BJJ training block in JSON format with segments 
       for warmup, technique, drilling, and live training. Focus on 
       guard passing concepts."</code></li>
    <li>Import the generated JSON file or paste directly</li>
    </ol>
    <h3 id="method-3-hybrid-days-exercises-segments">Method 3: Hybrid Days (Exercises + Segments)</h3>
    <p>You can combine traditional exercises with segments in the same day:</p>
    <p><strong>Use Cases:</strong><br />
    - Strength work followed by mobility (exercises → segments)<br />
    - Wrestling technique followed by conditioning (segments → exercises)<br />
    - Lifting with yoga cooldown (exercises → segments)</p>
    <p><strong>In JSON:</strong></p>
    <pre><code class="language-json">{
      &quot;name&quot;: &quot;Hybrid Day&quot;,
      &quot;exercises&quot;: [
        {
          &quot;name&quot;: &quot;Back Squat&quot;,
          &quot;sets&quot;: 4,
          &quot;reps&quot;: 5,
          &quot;weight&quot;: 225
        }
      ],
      &quot;segments&quot;: [
        {
          &quot;name&quot;: &quot;Hip Mobility&quot;,
          &quot;segmentType&quot;: &quot;mobility&quot;,
          &quot;durationMinutes&quot;: 10
        }
      ]
    }
    </code></pre>
    <h3 id="segment-field-reference">Segment Field Reference</h3>
    <h4 id="essential-fields-minimum-required">Essential Fields (Minimum Required)</h4>
    <ul>
    <li><strong>name</strong> – Segment name</li>
    <li><strong>segmentType</strong> – Type (warmup, technique, drill, etc.)</li>
    <li><strong>durationMinutes</strong> – Planned duration</li>
    </ul>
    <h4 id="common-optional-fields">Common Optional Fields</h4>
    <p><strong>For All Segment Types:</strong><br />
    - <strong>objective</strong> – Learning goal or purpose<br />
    - <strong>notes</strong> – Additional information<br />
    - <strong>coachingCues</strong> – Key teaching points<br />
    - <strong>constraints</strong> – Rules or limitations</p>
    <p><strong>For Skill Work (Technique, Drill):</strong><br />
    - <strong>techniques</strong> – Array of techniques covered<br />
      - name, keyDetails, commonErrors, counters, followUps<br />
    - <strong>positions</strong> – Starting positions<br />
    - <strong>qualityTargets</strong> – Success metrics<br />
      - successRateTarget, cleanRepsTarget, decisionSpeedSeconds</p>
    <p><strong>For Drilling:</strong><br />
    - <strong>drillPlan</strong> – Timed drill sequence<br />
      - items array with workSeconds, restSeconds<br />
    - <strong>partnerPlan</strong> – Partner drilling structure<br />
      - rounds, roundDurationSeconds, resistance<br />
      - roles (attackerGoal, defenderGoal)</p>
    <p><strong>For Live Training (Sparring, Rolling):</strong><br />
    - <strong>roundPlan</strong> – Round structure<br />
      - rounds, roundDurationSeconds, restSeconds<br />
      - winConditions, resetRule, intensityCue<br />
    - <strong>startPosition</strong> – Where to begin<br />
    - <strong>scoring</strong> – Win conditions for attacker/defender</p>
    <p><strong>For Yoga/Mobility:</strong><br />
    - <strong>flowSequence</strong> – Array of poses with hold times<br />
    - <strong>holdSeconds</strong> – Static hold duration<br />
    - <strong>breathCount</strong> – Number of breaths<br />
    - <strong>intensityScale</strong> – restorative, easy, moderate, strong, peak<br />
    - <strong>props</strong> – Equipment needed</p>
    <p><strong>For Breathwork:</strong><br />
    - <strong>breathwork</strong> – Breathing pattern<br />
      - style, pattern, durationSeconds</p>
    <p><strong>For Safety:</strong><br />
    - <strong>safety</strong> – Safety information<br />
      - contraindications, stopIf, intensityCeiling</p>
    <p><strong>For Media/Reference:</strong><br />
    - <strong>media</strong> – Instructional content<br />
      - videoUrl, imageUrl, diagramAssetId</p>
    <h3 id="complete-example-bjj-class-json">Complete Example: BJJ Class JSON</h3>
    <p>See the file <code>Tests/bjj_class_segments_example.json</code> in the repository for a fully-detailed example with all segment types and fields demonstrated.</p>
    <h3 id="tips-for-creating-segment-based-blocks">Tips for Creating Segment-Based Blocks</h3>
    <ol>
    <li><strong>Start Simple</strong></li>
    <li>Begin with basic segments (warmup, technique, cooldown)</li>
    <li>Add complexity as needed</li>
    <li>
    <p>Not every field needs to be populated</p>
    </li>
    <li>
    <p><strong>Be Clear with Objectives</strong></p>
    </li>
    <li>Each segment should have a clear learning goal</li>
    <li>
    <p>Help athletes understand the "why"</p>
    </li>
    <li>
    <p><strong>Use Appropriate Segment Types</strong></p>
    </li>
    <li>Match segment type to the activity</li>
    <li>
    <p>Use "other" for anything that doesn't fit</p>
    </li>
    <li>
    <p><strong>Plan Realistic Durations</strong></p>
    </li>
    <li>Account for transitions between segments</li>
    <li>
    <p>Leave buffer time for instruction</p>
    </li>
    <li>
    <p><strong>Include Safety Notes</strong></p>
    </li>
    <li>Especially important for high-intensity or contact segments</li>
    <li>
    <p>Document contraindications and stop conditions</p>
    </li>
    <li>
    <p><strong>Track What Matters</strong></p>
    </li>
    <li>Use quality targets for skill-based work</li>
    <li>Don't worry about tracking every metric</li>
    <li>
    <p>Focus on meaningful progression</p>
    </li>
    <li>
    <p><strong>Consider Hybrid Approaches</strong></p>
    </li>
    <li>Mix exercises and segments when appropriate</li>
    <li>Use the right tool for each activity</li>
    </ol>
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
    <p><strong>Logging Sets (Exercise-Based Days):</strong><br />
    - Each exercise shows <strong>expected values</strong> from your template<br />
    - Tap a set to expand and log your actual performance<br />
    - Use <strong>+ / -</strong> buttons to adjust weight, reps, time, distance, etc.<br />
    - Check the <strong>✓</strong> box when you complete the set<br />
    - The set turns green when marked complete</p>
    <p><strong>Logging Segments (Segment-Based Days):</strong><br />
    - Each segment shows its type, duration, and objective<br />
    - Tap the segment card to expand and view details<br />
    - Check the <strong>✓</strong> box when you complete the segment<br />
    - For segments with rounds (sparring, drilling):<br />
      - Use <strong>+ / -</strong> buttons to log rounds completed<br />
      - Track quality metrics if specified (success rate, clean reps)<br />
    - Add notes about technique, partner feedback, or observations</p>
    <p><strong>Status Indicators:</strong><br />
    - <strong>Gray</strong> – Not started<br />
    - <strong>Green with checkmark</strong> – Completed<br />
    - <strong>Progress bar</strong> – Shows completion percentage</p>
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
    - All exercises for each day (for exercise-based days)<br />
    - All segments for each day (for segment-based days)<br />
    - Sets, reps, and weights (exercises)<br />
    - Objectives, techniques, and round plans (segments)<br />
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
    - Review past blocks to plan future training<br />
    - View segment-based training plans (BJJ classes, yoga sessions)<br />
    - See technique progressions and drilling structures at a glance</p>
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
    - Day templates with exercises and/or segments<br />
    - Exercise details (sets, reps, progression) for traditional training<br />
    - Segment details (type, duration, techniques, round plans) for skill-based training<br />
    - Strength or conditioning parameters</p>
    <p><strong>Example Use Cases:</strong><br />
    - Import programs from online coaches<br />
    - Use ChatGPT or other AI to generate training blocks<br />
    - Share blocks between devices via JSON files<br />
    - Backup and transfer blocks<br />
    - Import BJJ class templates, yoga sequences, or martial arts training plans<br />
    - Create hybrid programs with both exercises and segments</p>
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
    - Screenshot your whiteboard for quick reference<br />
    - Use segments for skill-based training (BJJ, yoga, martial arts)<br />
    - <strong>Use segments for learning activities</strong> (AI/tech classes, language learning, music practice)<br />
    - <strong>Use segments for professional development</strong> (public speaking, skill workshops)<br />
    - <strong>Use segments for study sessions</strong> (structured academic work, research time)<br />
    - Mix exercises and segments when appropriate (hybrid days)<br />
    - Track quality over quantity for segment-based work<br />
    - Adapt segment types creatively (e.g., "Drill" for coding exercises, "Technique" for learning concepts)</p>
    <p>❌ <strong>DON'T:</strong><br />
    - Skip logging—you lose valuable data<br />
    - Delete blocks immediately after completion (archive first)<br />
    - Forget to progress weight/volume across weeks<br />
    - Ignore deload weeks—recovery is training<br />
    - Use exercises for activities better suited to segments (e.g., yoga, BJJ classes, learning sessions)<br />
    - Force non-quantifiable activities into sets/reps/weight structure</p>
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
    <p><strong>BJJ Training Block (4 weeks, 3 days/week) - Segments:</strong><br />
    - Day 1: Guard Retention Fundamentals<br />
      - Warmup → Technique → Drilling → Positional Sparring → Cooldown<br />
    - Day 2: Passing Concepts<br />
      - Warmup → Technique → Drilling → Live Rolling → Cooldown<br />
    - Day 3: Takedowns and Top Control<br />
      - Warmup → Technique → Situational Sparring → Integration → Cooldown</p>
    <p><strong>Yoga &amp; Mobility Program (4 weeks, 4 days/week) - Segments:</strong><br />
    - Day 1: Power Vinyasa (45 min)<br />
    - Day 2: Restorative &amp; Yin (60 min)<br />
    - Day 3: Core &amp; Balance Focus (30 min)<br />
    - Day 4: Breathwork &amp; Meditation (20 min)</p>
    <p><strong>Hybrid Athlete Program (6 weeks, 5 days/week) - Mixed:</strong><br />
    - Day 1: Lower Body Strength (exercises) + Hip Mobility (segments)<br />
    - Day 2: BJJ Class (segments)<br />
    - Day 3: Upper Body Strength (exercises) + Shoulder Mobility (segments)<br />
    - Day 4: Wrestling Conditioning (segments)<br />
    - Day 5: Full Body Lift (exercises) + Yoga Flow (segments)</p>
    <p><strong>Machine Learning Bootcamp (8 weeks, 3 days/week) - Segments:</strong><br />
    - Day 1: Theory &amp; Coding Practice<br />
      - Review/Lecture → Technique (live coding) → Drill (exercises) → Project Work<br />
    - Day 2: Advanced Concepts<br />
      - Review → Technique → Drill → Application → Review<br />
    - Day 3: Project Development<br />
      - Planning → Coding Session → Testing &amp; Debugging → Documentation</p>
    <p><strong>Language Learning Program (12 weeks, 4 days/week) - Segments:</strong><br />
    - Day 1: Grammar &amp; Structure (Lecture → Technique → Drill → Review)<br />
    - Day 2: Conversation Practice (Warmup → Drill → Positional/Role-play → Review)<br />
    - Day 3: Listening &amp; Reading (Warmup → Technique → Other/Comprehension → Review)<br />
    - Day 4: Writing &amp; Composition (Review → Technique → Drill → Other/Free writing)</p>
    <p><strong>Professional Development (4 weeks, 2 days/week) - Segments:</strong><br />
    - Day 1: Public Speaking Skills<br />
      - Warmup → Lecture → Technique → Drill → Full Presentation → Review<br />
    - Day 2: Leadership &amp; Communication<br />
      - Review → Technique → Role-play scenarios → Group discussion → Action planning</p>
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
    <p><strong>Contact &amp; Support:</strong><br />
    - Email: savagesbydesignhq@gmail.com<br />
    - Website: savagesbydesign.com<br />
    - Tap <strong>GO PRO</strong> → <strong>Contact Support</strong> (Pro users)</p>
    <p><strong>Community &amp; Development:</strong><br />
    - GitHub Issues for bugs: <a href="https://github.com/kje7713-dev/WorkoutTrackerApp/issues">github.com/kje7713-dev/WorkoutTrackerApp/issues</a><br />
    - GitHub Discussions: <a href="https://github.com/kje7713-dev/WorkoutTrackerApp/discussions">github.com/kje7713-dev/WorkoutTrackerApp/discussions</a><br />
    - Share your programs and get feedback</p>
    <hr />
    <h2 id="glossary">Glossary</h2>
    <p><strong>Block</strong> – A complete training program spanning multiple weeks</p>
    <p><strong>Day Template</strong> – A workout day design that repeats each week</p>
    <p><strong>Session</strong> – A single workout instance with logged data</p>
    <p><strong>Exercise</strong> – A traditional strength or conditioning movement with sets, reps, and weight</p>
    <p><strong>Segment</strong> – A time-based training module for skill work, technique, or non-traditional activities</p>
    <p><strong>Set</strong> – One round of an exercise (e.g., 5 reps at 185 lbs)</p>
    <p><strong>Progressive Overload</strong> – Gradually increasing training stress (weight, volume, intensity)</p>
    <p><strong>Deload</strong> – Reduced training volume for recovery</p>
    <p><strong>RPE (Rating of Perceived Exertion)</strong> – Scale of 1-10, how hard the set felt</p>
    <p><strong>RIR (Reps in Reserve)</strong> – How many more reps you could have done</p>
    <p><strong>Tempo</strong> – Movement speed (eccentric-pause-concentric-pause in seconds)</p>
    <p><strong>Superset</strong> – Two exercises performed back-to-back with no rest</p>
    <p><strong>Circuit</strong> – Multiple exercises performed sequentially</p>
    <p><strong>AMRAP</strong> – As Many Reps/Rounds As Possible</p>
    <p><strong>EMOM</strong> – Every Minute On the Minute</p>
    <p><strong>Periodization</strong> – Systematic planning of training variables over time</p>
    <p><strong>Segment Types:</strong></p>
    <ul>
    <li><strong>Warmup Segment</strong> – Preparation phase with movement and mobility</li>
    <li><strong>Technique Segment</strong> – Skill instruction and practice with coaching cues</li>
    <li><strong>Drill Segment</strong> – Repetitive practice with timed work/rest intervals</li>
    <li><strong>Positional Sparring</strong> – Live practice from specific positions with constraints</li>
    <li><strong>Rolling/Live Training</strong> – Free sparring or competition simulation</li>
    <li><strong>Cooldown Segment</strong> – Recovery and transition out of training</li>
    <li><strong>Breathwork Segment</strong> – Respiratory training and nervous system work</li>
    <li><strong>Mobility Segment</strong> – Flexibility and range of motion work</li>
    </ul>
    <p><strong>Quality Targets</strong> – Skill-based metrics (success rate, clean reps, decision speed) for segment tracking</p>
    <p><strong>Resistance Level</strong> – Intensity of opposition in partner drills (0-100%), where 0% is no resistance and 100% is full competition intensity</p>
    <p><strong>Round Plan</strong> – Structure for timed rounds in sparring or drilling (rounds, duration, rest)</p>
    <p><strong>Partner Plan</strong> – Framework for partner drilling with role definitions and resistance levels</p>
    <p><strong>Hybrid Day</strong> – Training day combining both exercises and segments</p>
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
    <li>[ ] <strong>Advanced:</strong> Import a segment-based block (BJJ, yoga, etc.) via AI Block Generator</li>
    </ul>
    <hr />
    <p><strong>Need more help?</strong></p>
    <ul>
    <li>Email: savagesbydesignhq@gmail.com</li>
    <li>Website: savagesbydesign.com</li>
    <li>Check the <a href="README.md">Technical README</a> for developers</li>
    <li>Visit our <a href="https://github.com/kje7713-dev/WorkoutTrackerApp">GitHub repository</a> for updates</li>
    </ul>
  </section>

</main>

<?php get_footer(); ?>
