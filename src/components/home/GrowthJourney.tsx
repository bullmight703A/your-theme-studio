import { useState } from "react";
import { cn } from "@/lib/utils";
import { Baby, Smile, Sparkles, GraduationCap, Backpack } from "lucide-react";

const stages = [
  {
    id: "infant",
    icon: Baby,
    title: "Infant Care",
    ages: "6 weeks - 12 months",
    color: "from-pink-500 to-rose-500",
    description: "Gentle, nurturing care for your littlest ones with dedicated caregivers who respond to each baby's unique needs and rhythms.",
    highlights: [
      "Low caregiver-to-infant ratios",
      "Safe sleep practices",
      "Developmental milestone tracking",
      "Daily communication with parents",
    ],
  },
  {
    id: "toddler",
    icon: Smile,
    title: "Toddlers",
    ages: "1 - 2 years",
    color: "from-orange-500 to-amber-500",
    description: "Active exploration and sensory experiences that encourage curiosity, language development, and early social skills.",
    highlights: [
      "Sensory play activities",
      "Language-rich environment",
      "Potty training support",
      "Music and movement",
    ],
  },
  {
    id: "preschool",
    icon: Sparkles,
    title: "Preschool",
    ages: "3 - 4 years",
    color: "from-green-500 to-emerald-500",
    description: "Creative learning through play-based curriculum that builds cognitive, social-emotional, and early literacy skills.",
    highlights: [
      "Pre-reading and math readiness",
      "Creative arts and expression",
      "Social skills development",
      "Nature exploration",
    ],
  },
  {
    id: "prek",
    icon: GraduationCap,
    title: "Pre-K",
    ages: "4 - 5 years",
    color: "from-blue-500 to-indigo-500",
    description: "Kindergarten-ready curriculum focusing on academic foundations, self-regulation, and collaborative learning.",
    highlights: [
      "Reading and writing basics",
      "Math concepts",
      "Science experiments",
      "Kindergarten transition prep",
    ],
  },
  {
    id: "school-age",
    icon: Backpack,
    title: "School Age",
    ages: "5 - 12 years",
    color: "from-purple-500 to-violet-500",
    description: "Before and after school programs with homework help, enrichment activities, and summer camp adventures.",
    highlights: [
      "Homework assistance",
      "STEM enrichment",
      "Sports and recreation",
      "Summer camp programs",
    ],
  },
];

const GrowthJourney = () => {
  const [activeStage, setActiveStage] = useState(stages[0]);

  return (
    <section className="section-padding bg-muted/30">
      <div className="container-site">
        {/* Section Header */}
        <div className="text-center max-w-2xl mx-auto mb-12">
          <span className="text-secondary font-semibold text-sm uppercase tracking-wider">
            Programs
          </span>
          <h2 className="text-3xl md:text-4xl font-bold mt-3 mb-4">
            The Growth Journey
          </h2>
          <p className="text-muted-foreground text-lg">
            Age-appropriate programs designed to nurture every stage of your child's development.
          </p>
        </div>

        {/* Stage Tabs */}
        <div className="flex flex-wrap justify-center gap-2 mb-12">
          {stages.map((stage) => (
            <button
              key={stage.id}
              onClick={() => setActiveStage(stage)}
              className={cn(
                "flex items-center gap-2 px-5 py-3 rounded-full text-sm font-medium transition-all duration-300",
                activeStage.id === stage.id
                  ? "bg-primary text-primary-foreground shadow-medium"
                  : "bg-card text-muted-foreground hover:bg-muted hover:text-foreground"
              )}
            >
              <stage.icon className="h-4 w-4" />
              <span className="hidden sm:inline">{stage.title}</span>
            </button>
          ))}
        </div>

        {/* Active Stage Content */}
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Visual */}
          <div className="relative">
            <div className={cn(
              "aspect-square rounded-3xl bg-gradient-to-br p-8 flex items-center justify-center",
              activeStage.color
            )}>
              <div className="text-center text-white">
                <activeStage.icon className="h-24 w-24 mx-auto mb-6 opacity-90" />
                <h3 className="text-3xl font-bold mb-2">{activeStage.title}</h3>
                <p className="text-xl opacity-90">{activeStage.ages}</p>
              </div>
            </div>
            {/* Decorative dots */}
            <div className="absolute -top-4 -right-4 w-8 h-8 bg-secondary rounded-full" />
            <div className="absolute -bottom-4 -left-4 w-6 h-6 bg-primary rounded-full" />
          </div>

          {/* Content */}
          <div className="space-y-6">
            <div>
              <h3 className="text-2xl md:text-3xl font-bold mb-4">
                {activeStage.title}
              </h3>
              <p className="text-lg text-muted-foreground leading-relaxed">
                {activeStage.description}
              </p>
            </div>

            {/* Highlights */}
            <div className="space-y-3">
              <h4 className="font-semibold text-foreground">Program Highlights:</h4>
              <ul className="grid sm:grid-cols-2 gap-3">
                {activeStage.highlights.map((highlight, index) => (
                  <li
                    key={index}
                    className="flex items-center gap-3 text-muted-foreground"
                  >
                    <div className="w-2 h-2 bg-secondary rounded-full shrink-0" />
                    {highlight}
                  </li>
                ))}
              </ul>
            </div>

            {/* CTA */}
            <div className="pt-4">
              <a
                href={`/programs/${activeStage.id}`}
                className="inline-flex items-center gap-2 text-primary font-semibold hover:underline"
              >
                Learn more about {activeStage.title}
                <span>→</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default GrowthJourney;